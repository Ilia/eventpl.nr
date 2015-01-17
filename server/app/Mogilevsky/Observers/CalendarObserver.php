<?php 
namespace Mogilevsky\Observers;

use \Mogilevsky\ObserverInterface;
use \Mogilevsky\Observers\BaseObserver;
use \Mogilevsky\Loggers\FileLogger;

class CalendarObserver extends BaseObserver implements ObserverInterface{

    public function created($model){
      
      FileLogger::instance()->info('hello!');

      var_dump("created");
    }

    public function updated($model){
      var_dump("updated");
    }

    public function deleted($model){
      var_dump("deleted");
    }

}