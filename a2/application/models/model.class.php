<?php
abstract class Model {

	public $data = array();
	protected $userID;
	protected $firstname;
	protected $lastname;
	protected $email;
	protected $role;

	/* __construct magic method */
	function __construct() {

	}

	abstract public function __set($key, $value);

	abstract  public function __get($key);

}

?>