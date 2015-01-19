<?php

use Mogilevsky\Storage\Model;

class Appointment extends Model {

  protected static $_rules = [
    'title' => 'required',
    'start_datetime' => 'required',
    'end_datetime' => 'required',
    'start_datetime'   => 'required|datetime:Y-m-d H:i:s|after:yesterday',
    'end_datetime'     => 'required|datetime:Y-m-d H:i:s|after:yesterday|after:start_datetime'
  ];

  protected static $_messages = [
    'end_datetime' => 'End time must be after start time',
    'datetime' => "Please provide a valid date [Y-m-d H:i:s]"
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