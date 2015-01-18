<?php 

namespace Mogilevsky\Logger;

use Mogilevsky\Logger\LogLevel as MogilevskyLogLevel;

define('LOGFILE', storage_path().'/logs/logfile.log');

class FileLogger extends \Psr\Log\AbstractLogger
{

  protected $_file;

  private static $instance = NULL;

  public function __construct($file)
  {
    if (!file_exists($file) &&
        !touch($file)) 
      throw new \InvalidArgumentException('Log file ' . $file . ' cannot be created');
    
    if (!is_writable($file)) 
      throw new \InvalidArgumentException('Log file ' . $file . ' is not writeable');
    
    $this->_file = $file;
  }

  public function log($level, $message, array $context = array())
  {
    $line = '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ' ' . $message . "\n";
    file_put_contents($this->_file, $line, FILE_APPEND);
  }

  public function created($model)
  {
    $_message = $this->_format_message($model, MogilevskyLogLevel::CREATED); 
    return $this->log(MogilevskyLogLevel::CREATED, $_message, array());
  }

  public function updated($model)
  {
    $_message = $this->_format_message($model, MogilevskyLogLevel::UPDATED); 
    return $this->log(MogilevskyLogLevel::UPDATED, $_message, array());
  }

  public function deleted($model)
  {
    $_message = $this->_format_message($model, MogilevskyLogLevel::DELETED); 
    return $this->log(MogilevskyLogLevel::DELETED, $_message, array());
  }

  private function _format_message($model, $level){
    return sprintf('%s with ID %d has been %s.', get_class($model), $model->id, strtolower($level)); 
  }

  public static function instance() { 
    if(self::$instance === NULL) {
      self::$instance = new FileLogger(LOGFILE);
    }
    
    return self::$instance;
  }
}