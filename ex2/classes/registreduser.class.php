<?php

Class RegisteredUser extends User {

	public function __construct($user_level, $user_id) {
    
      $this->__set('user_type', '1');

      parent::__construct($user_level);
      $this->data['user_id'] = $user_id;
   
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