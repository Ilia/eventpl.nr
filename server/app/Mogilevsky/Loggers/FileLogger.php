<?php 

define('LOGFILE', 'logfile.log');

namespace Mogilevsky\Loggers;

class FileLogger extends \Psr\Log\AbstractLogger
{
  protected $_file;

  private static $instance = NULL;

  public function __construct($file)
  {
      if (!file_exists($file) ||
          !touch($file)) 
        throw new \InvalidArgumentException('Log file ' . $logfile . ' cannot be created');
      
      if (!is_writable($file)) 
        throw new \InvalidArgumentException('Log file ' . $logfile . ' is not writeable');
      
      $this->_file = $file;
  }

  public function log($level, $message, array $context = array())
  {
      $line = '[' . date('Y-m-d H:i:s') . '] ' . strtoupper($level) . ': ' . $this->interpolate($message, $context) . "\n";
      file_put_contents($this->logfile, $logline, FILE_APPEND);
  }

  public static function instance() { 
    if(self::$instance === NULL) {
      self::$instance = new FileLogger(LOGFILE);
    }
    
    return self::$instance;
  }
}