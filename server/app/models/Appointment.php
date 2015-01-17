<?php

class Appointment extends Eloquent {

  public static function boot()
  {
    parent::boot();
    Appointment::observe(new Mogilevsky\Observers\AppointmentObserver);
  }

  public function calendar()
  {
    return $this->belongsTo('Calendar');
  }
}