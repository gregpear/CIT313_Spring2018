<?php
class Users extends Model{	

	public $uID;
	public $first_name;
	public $last_name;
	public $email;
	protected $user_type;

	public function __construct() {
		parent::__construct();

		if(isset($_SESSION['uID'])) {
			$userInfo = $this->getUserFromID($_SESSION['uID']);
			
			$this->uID = $userInfo['uID'];
			$this->first_name = $userInfo['first_name'];
			$this->last_name = $userInfo['last_name'];
			$this->email = $userInfo['email'];	
			$this->user_type = $userInfo['user_type'];	
		}
	}
	public function getUserName(){
		
		return $this->first_name ." ". $this->last_name;
	
	}
	
	public function addUser($data){
		
		$sql='INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'User added.';
		return $message;
		
	}

	function getUser($uID){
		
		$sql =  'SELECT uID,first_name, last_name, email 
				FROM users
				WHERE uID = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($uID));
		
		$user = $results;
	
		return $user;
	
	}
		
	public function getAllUsers($limit = 0){
		
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}

		
		$sql =  'SELECT uID,first_name, last_name, email 
				FROM users'.$numposts;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$users[] = $row;
		}

		return $users;
	
	}

	public function checkUser($email, $password) {
		$sql =  'SELECT uID,email,password 
				FROM users
				WHERE email = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($email,$password));
		
		$password_db = $results[2];

		if(password_verify($password, $password_db)) {
			return $results;
		} else {
			return false;
		}
		
	}

	
	
	public function getUserEmail($uID){
		
		return $this->email;
	
	}

	public function isRegistered() {
		if(isset($this->user_type)) {
			return true;
		} else {
			return false;
		}
	}

	public function isAdmin(){
		
		if($this->user_type == '1') {
			return true;
		} else {
			return false;
		}
	
	}

	public function getUserFromEmail($email){
		
		$sql =  'SELECT uID,first_name, last_name, email 
				FROM users
				WHERE email = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($email));
		
		$user = $results;
	
		return $user;
	
	}

	public function getUserFromID($uID){
		
		$sql =  'SELECT uID,first_name, last_name, email, user_type  
				FROM users
				WHERE uID = ?';
		// perform query
		$results = $this->db->getrow($sql, array($uID));
		
		$user = $results;
	
		return $user;
	
	}
	
}