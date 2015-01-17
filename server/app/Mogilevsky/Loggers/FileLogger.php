<?php 

namespace Mogilevsky\Loggers;

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
      $line = '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ': ' . $message . "\n";
      file_put_contents($this->_file, $line, FILE_APPEND);
  }

  public static function instance() { 
    if(self::$instance === NULL) {
      self::$instance = new FileLogger(LOGFILE);
    }
    
    return self::$instance;
  }
}