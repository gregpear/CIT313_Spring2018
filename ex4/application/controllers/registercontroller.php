<?php

class RegisterController extends Controller{
	
	public $userObject;
	
	
	public function add(){
		
			$this->userObject = new Users();
			
			$data = array('first_name'=>$_POST['first_name'],'last_name'=>$_POST['last_name'],'email'=>$_POST['email'],'password'=>password_hash($_POST['password'],PASSWORD_DEFAULT));
			
	
			$result = $this->userObject->addUser($data);
			
			$this->set('message', $result);
			
		
	}
	
	
	
}
