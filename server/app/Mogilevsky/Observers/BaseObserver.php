<?php 
namespace Mogilevsky\Observers;
use \Mogilevsky\Logger\FileLogger;

class BaseObserver implements \Mogilevsky\ObserverInterface{

    public function saving($model){
      return $model->validate();
    }

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