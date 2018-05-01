<?php
class MembersController extends Controller{
	
	public $userObject;
  
   	public function users($uID){
        $this->userObject = new Users();
		$user = $this->userObject->getUser($uID);	    
	  	$this->set('user',$user);
   	}
	
	public function index(){
     
	    $this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'The Members View');
		$this->set('users',$users);
		$this->set('first_name',$first_name);
		$this->set('last_name',$last_name);
		$this->set('email',$email);
	}
	
	public function profile(){

		$this->userObject = new Users();
		$user = $this->userObject->getUser($_SESSION['uID']);	   	
		$this->set('first_name', $user['first_name']);
		$this->set('last_name', $user['last_name']);
		$this->set('email', $user['email']);
		$this->set('password', $user['password']);
				
	}
	
	public function updateProfile(){
		
		$this->userObject = new Users();
		if(!empty($_POST['password'])){	
			$passhash = password_hash($_POST['password'],PASSWORD_DEFAULT);
			$data = array('first_name'=>$_POST['first_name'], 'last_name'=>$_POST['last_name'],'email'=>$_POST['email'], 'password'=>$passhash ,'uID'=>$_POST['uID']);
			
		}
		else{
			$data = array('first_name'=>$_POST['first_name'], 'last_name'=>$_POST['last_name'],'email'=>$_POST['email'], 'uID'=>$_POST['uID']);
		}	
		$result = $this->userObject->updateUser($data);
		$this->set('message', $result);	
	}	
}
?>