<?php
class Comments extends Model{

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
	
	public function deleteComment($commentID){
		
		$sql='DELETE from comments where commentID='.$commentID.'';
		$this->db->execute($sql,$data);
        $message = 'comment deleted.';
        return $message;
	}
}
?>			