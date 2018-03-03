<?php
class Post extends Model{
	
	function getPost($pID){
		
		$sql =  'SELECT p.pID, p.title, p.content, p.date, p.uID, p.categoryID, u.first_name, u.last_name, c.name 
				FROM posts p 
				INNER JOIN users u ON u.uID = p.uID
				INNER JOIN categories c ON c.categoryID = p.categoryID
				WHERE p.pID = ?';
		
		// perform query
		$results = $this->db->getrow($sql, array($pID));
		
		$post = $results;
	
		return $post;
	
	}
		
	public function getAllPosts($limit = 0){
		
		if($limit > 0){
			
			$numposts = ' LIMIT '.$limit;
		}
		
		$sql =  'SELECT p.pID, p.title, p.content, p.date, p.uID, p.categoryID, u.first_name, u.last_name, c.name 
				FROM posts p 
				INNER JOIN users u ON u.uID = p.uID
				INNER JOIN categories c ON c.categoryID = p.categoryID'.$numposts;
		
		// perform query
		$results = $this->db->execute($sql);
		
		while ($row=$results->fetchrow()) {
			$posts[] = $row;
		}

		return $posts;
	
	}
	
	public function addPost($data){
		
		$sql='INSERT INTO posts (title,content,date,categoryID) VALUES (?,?,?,?)'; 
		$this->db->execute($sql,$data);
		$message = 'Post added.';
		return $message;
		
	}

	public function updatePost($data){
		
		$sql='UPDATE posts SET title = ?, content = ?, date = ?, categoryID = ? WHERE pID = ?'; 
		$this->db->execute($sql,$data);
		$message = 'Post updated.';
		return $message;
		
	}
	
	
}