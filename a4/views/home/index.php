<?php
include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
    <h1>Latest News From <?php echo $rss_title; ?></h1>
  </div><?php
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
<?php include('views/elements/footer.php');?>
