<?php

class BlogController extends Controller{
	
	public $postObject;
	public $categoryObject;
  
   	public function post($pID){
        $this->postObject = new Post();
		$post = $this->postObject->getPost($pID);
	  	$this->set('post',$post);
   	}
	
	public function index(){
		$this->postObject = new Post();
		$posts = $this->postObject->getAllPosts();
		$this->set('title', 'The Default Blog View');
		$this->set('posts',$posts);
	}
	
	public function category($cID){
		
		$this->postObject = new Post();
		$posts = $this->postObject->getCatPosts($cID);
		
		$this->set('title',$posts['categoryName'].'&nbsp;Posts');
		$this->set('posts',$posts['posts']);
	}
	
	
	
	
}

?>