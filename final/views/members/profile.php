<?php
include('views/elements/header.php');?>

<div class="container">
<div class="page-header">
	<h1>Update Profile</h1>

</div>
 <?php if($message){?>
    <div class="alert alert-success">
   <button type="button" class="close" data-dismiss="alert">close</button>
    	<?php echo $message; ?>
    </div>
  <?php }?>
  
	<div class="row">
      <div class="span8">
		  <form id="updateform" action="<?php echo BASE_URL ;?>members/updateProfile" method="post">
		
			<fieldset>
				<label for="first_name">First Name: <font color="#FF0000">*</font></label>
				<input type="text" id="first_name" name="first_name" value="<?php echo $u->first_name; ?>"  />
				<br />
							
				<label for="last_name">Last Name: <font color="#FF0000">*</font></label>
				<input type="text" class="txt" id="last_name" name="last_name" value="<?php echo $u->last_name; ?>"  />
				<br />
				 
				<label for="email">E-mail Address: <font color="#FF0000">*</font></label>
				<input type="text" class="txt" id="email" name="email" value="<?php echo $u->email; ?>"   />
				<br />
				
				<label for="password">Password: <font color="#FF0000">*</font></label>
				<input type="password" class="txt" id="password" name="password"/>
				
				<label for="password">Confirm Password: <font color="#FF0000">*</font></label>
				<input type="password" class="txt" id="passwordconfirm" name="password_verify"/>
				
				<br />
				
				<input type="hidden" name="uID" id="uID" value="<?php echo $u->uID; ?>"/>
				 
				<button id="submit" type="submit" class="btn btn-primary" >Update Profile</button>
			</fieldset>
		</form>
  </div>
  </div>
</div>

<?php include('views/elements/footer.php');?>