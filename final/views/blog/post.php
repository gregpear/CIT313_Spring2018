<?php include('views/elements/header.php');?>
<?php
if( is_array($post) ) {
    extract($post);

}?>

    <div class="container">
        <div class="page-header">

            <h1><?php echo $title;?></h1>
        </div>
        <p><?php echo $content;?></p>
        <sub><?php echo 'Posted on ' . $date . ' by <a href="'.BASE_URL.'members/view/'. $uid.'">'. $first_name . ' ' . $last_name . '</a> in <a href="'.BASE_URL.'blog/category/'. $categoryid.'">' . $name .'</a>'; ?>
        </sub><br /><br />
	
		  <?php
		if($u->isAdmin()) {
			?>
		
		<a class="btn btn-primary" href="<?php echo BASE_URL;?>manageposts/edit/<?php echo $pID;?>">Edit Post</a>
		<a class="btn btn-primary" href="<?php echo BASE_URL;?>manageposts/delete/<?php echo $pID;?>">Delete Post</a>
		
		<?php } ?>
		
	
    <br /><br />
	
	<div id="cmain"> 		
	</div>
	<?php	
		if(!isset($_SESSION['uID']) || $_SESSION['uID'] < 0)
		{
	?>
			<a href="<?php echo BASE_URL; ?>login" class="btn btn-primary">Login</a><?php
		}
		else
		{
	?>
	 
		<form action="<?php echo BASE_URL; ?>post/addComments" method="POST">
			<textarea class="form-control" id="textComment" name="textComment" value="Comments." placeholder="Comments." rows="3" style="width:75%;"></textarea>
			<br>
			<input type="submit" id="submitComment" class="btn btn-primary" value="Comment">
			
			
			<input type="hidden" name="pid" id="pid" value="<?php echo $pID; ?>">
			<input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION['uID']; ?>">

		</form>
	<?php
	}?></div><?php
	 include('views/elements/footer.php');
	?>