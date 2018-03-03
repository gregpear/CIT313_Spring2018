
<?php include('elements/header.php');?>
<?php 
if( is_array($user) ) {
	extract($user);?>

<div class="container">
	<div class="page-header">

<h1>Member <?php echo $uID; ?></h1>
  </div>

<p><?php echo $first_name . " " .$last_name;?></p>
<a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>

</div>
<?php }?>

<?php if( is_array($users) ) {?>

<div class="container">
<div class="page-header">

<h1><?php echo $title;?></h1>
  </div>

	<?php foreach($users as $u){?>
    <h3><a href="<?php echo BASE_URL?>members/view/<?php echo $u['uID'];?>" title="<?php echo $u['first_name'] . " ". $u['last_name'];?>"><?php echo $u['first_name'] . " ". $u['last_name'];?></a></h3>
	<p><?php echo $u['email'];?></p>
<?php }?>
</div>

<?php }?>


<?php include('elements/footer.php');?>