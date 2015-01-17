<?php 
namespace Mogilevsky\Observers;

use \Mogilevsky\ObserverInterface;
use \Mogilevsky\Observers\BaseObserver;

class AppointmentObserver extends BaseObserver implements ObserverInterface{

    public function created($model){
      var_dump("created");
    }

    public function updated($model){
      var_dump("updated");
    }
}