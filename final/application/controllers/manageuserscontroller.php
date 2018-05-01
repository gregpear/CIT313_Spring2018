<?php
class ManageUsersController extends Controller{
	
	public $userObject;
  
   	public function users($uID){
        $this->userObject = new Users();
		$user = $this->userObject->getUser($uID);	    
	  	$this->set('user',$user);
   	}
	
	public function index(){
	
        $this->userObject = new Users();
		$users = $this->userObject->getAllUsers();
		$this->set('title', 'Manage Users');
		$this->set('users',$users);	

	}
	
	public function delete($uID){
 		$this->userObject = new Users();
		$result = $this->userObject->deleteUser($uID);
		$this->set('message',$result);
		$users = $this->userObject->getAllUsers();
		$this->set('users',$users);	
		$this->set('title', 'Manage Users');
	}
	
	public function approve($uID){
	
 		$this->userObject = new Users();
		$result = $this->userObject->isActive($uID);
		$this->set('message',$result);
		$users = $this->userObject->getAllUsers();
		$this->set('users',$users);	
		$this->set('title', 'Manage Users');

	}
	
}