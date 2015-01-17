<?php 
namespace Mogilevsky;

interface ObserverInterface
{
  public function created($model);
  public function updated($model);
}