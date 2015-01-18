<?php

use Mogilevsky\Storage\Model;

class Appointment extends Model {

  protected static $_rules = [
    'title' => 'required',
    'start_datetime' => 'required',
    'end_datetime' => 'required'
  ];

  protected $fillable = array('title', 'notes', 'location', 'start_datetime', 
                              'end_datetime');

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