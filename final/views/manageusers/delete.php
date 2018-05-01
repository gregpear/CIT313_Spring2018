<?php
include('views/elements/header.php');?>
<div class="container">
<div class="page-header">
<h1><?php echo $title;?></h1>

</div>
 	<?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message;?>
    </div>
	  <?php }
	  
	 foreach($users as $user){
     echo "<div class=well>";
	 echo "<strong>".$user['first_name']."&nbsp;"; 
	 echo $user['last_name']."</strong>	<br>";
    	
	  if($user['user_type'] != 1) {
	 ?>	
	 	<a class='btn btn-danger' href="<?php echo BASE_URL;?>manageusers/delete/<?php echo $user['uID'];?>">Delete</a><?php
		
		if($user['active'] != 1) {
	 	
		?>&nbsp;<a class='btn btn-primary' href="<?php echo BASE_URL;?>manageusers/approve/<?php echo $user['uID'];?>">Approve</a><?php	 
	 	 
		 }
	  }
		 echo "</div>";

	 	}?>
</div>

<?php include('views/elements/footer.php');?>