<?php 
namespace Mogilevsky;

interface ObserverInterface
{
  public function saving($model);
  public function created($model);
  public function updated($model);
}