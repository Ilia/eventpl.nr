<?php 
namespace Mogilevsky\Validation;

class Validator extends \Illuminate\Validation\Validator {


  public function validateDateTime($attribute, $value, $parameters)
  {
      $format = 'Y-m-d H:i:s';
      if (isset($parameters[0])){
        $format = $parameters[0];
      }
      \DateTime::createFromFormat($format, trim($value));
      $valid = \DateTime::getLastErrors();        
      return $valid['warning_count'] == 0 && $valid['error_count'] == 0;
  }
  /**
   * Check to see if end date comes after start date
   * 
   * @param  $attribute
   * @param  $value
   * @param  $parameters 
   * @return boolean
   */
  public function validateAfterDateTime($attribute, $value, $parameters)
  {
    $start_datetime = $this->getValue($parameters[0]); 
    return (strtotime($value) > strtotime($start_datetime));
  }

}