<?php

Class user extends Model {

  public function __construct() {
      
      parent::__construct();
  }


  public function __set($key, $value) {
      
      $this->data[$key] = $value;
  }

  public function __get($key) {
      return $this->data[$key];
    
  }

  public function __destruct() {
      unset($this->data);
  }

  function getName() {

    return array (
      'userID'    => $this->__get('userID'),
      'firstname' => $this->__get('firstname'),
      'lastname'  => $this->__get('lastname'),
      'email'     => $this->__get('email'),
      'role'      => $this->__get('role'),
    );
  }

}

?>