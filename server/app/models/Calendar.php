<?php

use Watson\Validating\ValidatingTrait;

class Calendar extends Eloquent {

  use ValidatingTrait;

  protected $rules = [
    'name'   => 'required|unique:calendars,name',
  ];

  protected $validationMessages = [
    'name.unique' => "Another calendar is using that name already."
  ];

  protected $fillable = array('name');
}
