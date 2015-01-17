<?php 
namespace Mogilevsky\Observers;

class AppointmentObserver implements \Mogilevsky\ObserverInterface{

    public function created($model){
      var_dump("created");
    }

    public function updated($model){
      var_dump("updated");
    }
}