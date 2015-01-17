<?php
use Mogilevsky\Storage\Model;

class Calendar extends Model {

  
  protected static $_rules = [
    'name'   => 'required|unique:calendars,name',
  ];

  protected static $_messages = [
    'name.unique' => "Another calendar is using that name already."
  ];

  protected $fillable = array('name');

  public function appointements()
  {
    return $this->hasMany('Appointement');
  }

  public static function boot()
  {
    parent::boot();
    Calendar::observe(new Mogilevsky\Observers\CalendarObserver);
  }
}
