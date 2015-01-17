<?php 
namespace Mogilevsky\Observers;

use \Mogilevsky\ObserverInterface;
use \Mogilevsky\Observers\BaseObserver;
use \Mogilevsky\Logger\FileLogger;

class CalendarObserver extends BaseObserver implements ObserverInterface{

    public function created($model){
      FileLogger::instance()->created($model);
    }

    public function updated($model){
      FileLogger::instance()->updated($model);
    }

    public function deleted($model){
      FileLogger::instance()->deleted($model);
    }

}