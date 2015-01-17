<?php 
namespace Mogilevsky\Storage;

Class Model extends Eloquent {

  protected $_errors;

  protected static $_rules = array();

  protected static $_messages = array();

  protected $_validator;
}