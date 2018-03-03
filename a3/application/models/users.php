<?php
class Users extends Model{
	
	
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
	
	
}