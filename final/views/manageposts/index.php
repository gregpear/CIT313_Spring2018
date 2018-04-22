<?php include('views/elements/header.php');?>

<div class="container">
	<div class="page-header">
	
   <h1>Manage Posts</h1>
  </div>
  
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message; ?>
    </div>
  <?php }?>
  
  <div class="row">
      <div class="span8">
		
		 <a href="<?php echo BASE_URL;?>manageposts/add" class="btn btn-primary">Add Post</a>
		<a href="<?php echo BASE_URL;?>categories" class="btn btn-primary">Manage Categories</a>
       
        <?php foreach($posts as $p){?>
	
	   <h3><?php echo $p['title'];?></h3>
  		<h5><?php echo  $p['date']; ?></h5>
		
		<a class="btn btn-primary" href="<?php echo BASE_URL;?>blog/post/<?php echo $p['pID'];?>">View Post</a>
		<a class="btn btn-primary" href="<?php echo BASE_URL;?>manageposts/edit/<?php echo $p['pID'];?>">Edit Post</a>
		<a class="btn btn-primary" href="<?php echo BASE_URL;?>manageposts/delete/<?php echo $p['pID'];?>">Delete Post</a>
	
		<?php } ?>
    
      </div>	    
	
	</div>
</div>
 
          
    
<?php include('views/elements/footer.php');?>

