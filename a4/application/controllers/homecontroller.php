<?php

class HomeController extends Controller{
	
	public function index(){

		$url="http://fox59.com/feed";
		$rss=new RssDisplay($url);
		
		$items=$rss->getFeedItems(8);
		$this->set('rss_items',$items);
		
		$channel_data=$rss->getChannelInfo();
		$this->set('rss_title',$channel_data->title);

	}
	
}

?>