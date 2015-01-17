<?php 
namespace Mogilevsky\Observers;

class BaseObserver implements \Mogilevsky\ObserverInterface{

    public function saving($model){
      return $model->validate();
    }

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