<?php

Class User {

  public $data = array();

  protected $user_id;
  protected $user_type;
  protected $first_name;
  protected $last_name;
  protected $email_address;
  protected $user_level;

  public function __construct($user_level) {
      $this->data['user_level'] = $user_level;
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

}

?>