<?php
class AjaxController extends Controller{

  		protected $postObject;
		protected $userObject;
		protected $categoryObject;
		protected $commentObject;
	
	public function index(){
		
		$this->set("response","Invalid Request");
	}
	
	public function get_post_content(){
		
		$this->postObject=new Post();
		$post=$this->postObject->getPost($_GET['pID']);
		$this->set('response',$post['content']);
	}
	
	public function postComment(){
	
		$this->commentObject= new Comments();
		$data=array('commentText'=>$_POST['data'], 'date'=>date('Y-m-d H:i:s'), 'postID'=>$_POST['postid'], 'uID'=>$_POST['userid']);
		$result = $this->commentObject->addComments($data);
		$this->set('message', $result);
	}
	
	public function getComments(){
		
		$this->userObject = new Users();
		$this->commentObject= new Comments();
		$post=$this->commentObject->getComments($_POST['id']);
		$content = '';
		foreach($post as $key => $value) {
			$content .= '<div class="well">'.$value["commentText"].'<br>';
			$content .= $value['first_name']."&nbsp;".$value['last_name'];
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
		
		$this->commentObject= new Comments();
		$result = $this->commentObject->deleteComment($_POST['id']);
		$this->set('message', $result);
	}
		
}

?>