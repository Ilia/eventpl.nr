<?php
namespace Mogilevsky\Validation;
 
use Mogilevsky\Validation\Validator;
use Illuminate\Support\ServiceProvider;
 
class ValidatorService extends ServiceProvider {
 
    public function register() {}
 
    public function boot() {
        $this->app->validator->resolver( function( $translator, $data, $rules, $messages = array(), $customAttributes = array() ) {
            return new Validator( $translator, $data, $rules, $messages, $customAttributes );
        } );
    }
 
}