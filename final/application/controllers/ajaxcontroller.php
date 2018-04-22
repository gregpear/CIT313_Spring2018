<?php

class AjaxController extends Controller{

  		protected $postObject;
		protected $userObject;
		protected $categoryObject;
	
	public function index(){
		
		$this->set("response","Invalid Request");
	}
	
	public function get_post_content(){
		
		$this->postObject=new Post();
		$post=$this->postObject->getPost($_GET['pID']);
		$this->set('response',$post['content']);
	}
	
	public function postComment(){
	
		$this->postObject = new Post();
		
		$data=array('commentText'=>$_POST['data'], 'date'=>date('Y-m-d H:i:s'), 'postID'=>$_POST['postid'], 'uID'=>$_POST['userid']);
		$result = $this->postObject->addComments($data);
		$this->set('message', $result);
	}
	
	public function getComments(){
		$this->postObject=new Post();
		$this->userObject = new Users();
		$post=$this->postObject->getComments($_POST['id']);
		$content = '';
		foreach($post as $key => $value) {
			$content .= '<div class="well">'.$value["commentText"].'<br>';
			$content .= $this->userObject->getUserName();
			$content .='<br>'.$value["date"].'<br><form action="#" method="POST"><input id="commentID" type="hidden" value="'.$value["commentID"].'"></form>';
			
			if($this->userObject->isAdmin()) {
				$content .= '<button type="button" class="close moveleft">Delete</button>
				</div>';
			} else {
				$content .= '</div>';
			}
		}
		
		$this->set('response',$content);
	}
	
	public function deleteComment(){

		$this->postObject = new Post();
		$result = $this->postObject->deleteComment($_POST['id']);
		$this->set('message', $result);
	}
	
	
	
}

?>