<?php

abstract Class user {

  public $data = array();

  protected $user_id;
  protected $user_type;
  protected $first_name;
  protected $last_name;
  protected $email_address;
  protected $user_level;

  function __construct($user_level) {
    $this->data['user_level'] = $user_level;
  }

  abstract public function __set($key, $value);

  abstract  public function __get($key);

  public function __destruct() {
      unset($this->data);
  }

}

?>