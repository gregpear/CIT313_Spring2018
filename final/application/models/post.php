<?php
class Post extends Model{

    function getPost($pID){
        $sql = 'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid
		WHERE p.pID = ?
		';
        $results = $this->db->getrow($sql, array($pID));

        $post = $results;

        return $post;

    }

    public function getUserPosts($uID){

        $sql = 'select * from posts where uID = ?';

        $results = $this->db->execute($sql, $uID);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function getCatPosts($cID){

        $sql = 'select * from posts where categoryID = ?';

        $results = $this->db->execute($sql, $cID);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;
    }

    public function getAllPosts($limit = 0){

        if($limit > 0){

            $numposts = ' LIMIT '.$limit;
        }

        $sql =  'SELECT p.pID, p.title, p.content, p.uid, p.categoryid, p.date, c.name as name, u.first_name, u.last_name FROM posts p
		INNER JOIN categories c on c.categoryid = p.categoryid
		INNER JOIN users u on u.uid = p.uid'.$numposts;

        // perform query
        $results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
        }

        return $posts;

    }

    public function addPost($data){

        $sql='INSERT INTO posts (title,content,categoryID,date,uID) VALUES (?,?,?,?,1)';
        $this->db->execute($sql,$data);
        $message = 'Post added.';
        return $message;

    }

    public function updatePost($data) {

        $sql = 'UPDATE posts SET title = ?, content = ?, categoryID = ?, date = ? where pID = ?';
        $this->db->execute($sql, $data);
        $message = "Post updated.";
        return $message;
    }
	
	public function addComments($data){
		$sql='INSERT INTO comments(commentText, date, postID, uID) VALUES(?,?,?,?)';
		$this->db->execute($sql,$data);
        $message = 'comment added.';
        return $message;
	}
	
	public function getComments($pID){
	
        $sql ='SELECT  c.*, u.first_name, u.last_name FROM comments c
		LEFT JOIN users u on u.uid = c.uid where c.postID = '.$pID.' order by c.commentID desc';
		
		$results = $this->db->execute($sql);

        while ($row=$results->fetchrow()) {
            $posts[] = $row;
		}
		return $posts;
    }
	public function deletePost($pID){
		
		$sql='DELETE from posts where pID='.$pID.'';
		$this->db->execute($sql,$data);
        $message = 'post deleted.';
        return $message;
	}
	
	public function deleteComment($commentID){
		
		$sql='DELETE from comments where commentID='.$commentID.'';
		$this->db->execute($sql,$data);
        $message = 'comment deleted.';
        return $message;
	}
}