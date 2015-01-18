<?php 
namespace Mogilevsky\Storage;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Validator;

Class Model extends Eloquent {

  protected $_errors;

  protected static $_rules = array();

  protected static $_messages = array();

  protected $_validator;

  public function __construct(array $attributes = array(), Validator $validator = null)
  {
    parent::__construct($attributes);
    $this->_validator = $validator ? $validator : \App::make('validator');
  }

  public function validate()
  {
    $v = $this->_validator->make(
            $this->attributes, 
            static::$_rules, 
            static::$_messages);
    if ($v->passes())
    {
        return true;
    }
    $this->setErrors($v->messages());
    return false;
  }

  protected function setErrors($errors)
  {
    $this->_errors = $errors;
  }
   
  public function getErrors()
  {
    return $this->_errors;
  }
    
  public function hasErrors()
  {
    return ! empty($this->_errors);
  }
}