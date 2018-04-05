<?php
class RssDisplay extends Model {
       protected $feed_url;
	   protected $num_feed_items;
	   
    	public function __construct($url){
			parent::__construct();
		
			$this->feed_url=$url;
    	}
		public function getFeedItems($num_feed_items){
			$result_data = array();
			$feed_data=simplexml_load_file($this->feed_url, 'SimpleXMLIterator');
			$items = new LimitIterator($feed_data->channel->item, 0, $num_feed_items);
			return $items;
		}
		
		public function getChannelInfo(){
			$result_data = array();
			$feed_data=simplexml_load_file($this->feed_url);
			$channel_data = $feed_data->channel;
			return $channel_data;
		}
}

?>