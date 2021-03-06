<?php
/**
 * A form to login the user profile.
 * 
 * @package LatteCore
 */
class CFormUserLogin extends CForm {

  /**
   * Constructor
   */
  public function __construct($object) {
    parent::__construct();
    $this->AddElement(new CFormElementText('username'))
         ->AddElement(new CFormElementPassword('password'))
         ->AddElement(new CFormElementSubmit('login', array('callback'=>array($object, 'DoLogin'))));

    $this->SetValidation('username', array('not_empty'))
         ->SetValidation('password', array('not_empty'));
  }
  
}