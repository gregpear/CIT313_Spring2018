<?php

class WeatherController extends Controller{
	
	public function index(){
			$this->set('result',false);
	}
	public function getresults(){
	
		$xml = simplexml_load_file("http://api.wunderground.com/api/9275ef0b6f8bd4ea/conditions/q/".$_POST['zip'].".xml");
		$this->set('result',true);
		$this->set('weather',$xml);
		
	}
	
}


?>
