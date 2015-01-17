<?php 
namespace Mogilevsky\Observers;

class CalendarObserver implements \Mogilevsky\ObserverInterface{

    public function created($model){
      var_dump("created");
    }

    public function updated($model){
      var_dump("updated");
    }

    public function deleted($model){
      var_dump("deleted");
    }

}