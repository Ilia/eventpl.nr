<?php

Route::group(array('prefix' => 'v1'), function() {
  Route::resource('calendars', 'CalendarController', 
      array('only' => array('index', 'update', 'store', 'destroy', 'show')));
  Route::resource('calendars.appointments', 'AppointmentController',
      array('only' => array('index', 'update', 'store', 'destroy', 'show')));
});