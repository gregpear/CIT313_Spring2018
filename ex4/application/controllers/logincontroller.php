<?php

class LoginController extends Controller{

	public $userObject;		
   	public function do_login(){
   		
   		$this->userObject = new Users();
		
		$email = $_POST['email'];
		$password = $_POST['password'];
	
		$result = $this->userObject->checkUser($email, $password);

		if($result) {
			$_SESSION['uID'] = $result['uID'];
			header('Location:'.BASE_URL);
			exit();
		} 
	   
   	}
	
	
}