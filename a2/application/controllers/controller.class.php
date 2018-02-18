<?php
class Controller {

	public $load;
	public $user; 

	function __construct() {

		$this->load = new Load();
		$this->user = new user();
		$this->home();

	}

	function home() {		
		$this->user->__set('userID', 'crdillon');
		$this->user->__set('firstname', 'Rob');
		$this->user->__set('lastname', 'Dillon');
		$this->user->__set('email', 'crdillon@iu.edu');
		$this->user->__set('role', 'admin');

		$data = $this->user->getName();
		
		$this->load->view('view.php', $data);
	}
}

?>