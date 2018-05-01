<?php
include('views/elements/header.php');?>

<div class="container">

<div id="image">
	<img src="<?php echo BASE_URL; ?>views/img/news.jpg" width="100%" style="height:200px;" />
</div>

<div class="page-header">
    <h1>Latest News From  <?php echo $rss_title; ?></h1>
  </div>
  
  <div id="home-content"><?php
  	if($rss_items) {
		foreach($rss_items as $key => $value) {
		
			?><div>
			   <h4><a href="<?php echo $value->link; ?>"><?php echo $value->title; ?></a> (<?php echo date('F d, Y, g:i a', strtotime($value->pubDate)); ?>)</h4>
			   <p><?php echo $value->description; ?></p>
			</div>
			<hr><?php
		}
	}
	?></div>	 
    
	<div id="weather">
		<h4>Get your local weather</h4>
		<h6>Enter your zip code below</h6>
		

		<form id='weather_form' method="post" action="<?php echo BASE_URL; ?>weather/getresults">
		       
		    
		    <input type="text" name="zip" id="zip" required="zip" />
		    <br/>
		    <br/>
		    <br/>
		    <button type="submit" class="btn btn-primary">View Weather</button>
		            
		</form>

	</div>
</div>



<?php include('views/elements/footer.php');?>
