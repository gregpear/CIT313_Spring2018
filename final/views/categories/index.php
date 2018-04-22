<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
		<h1>Categories</h1>
  	</div>
    
  		<?php if($message){?>
    <div class="alert alert-success">
    	<button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message;?>
    </div>
  <?php }
  
		foreach($categories as $key => $value){
			echo "<h3>".$value."</h3>";
			echo "<a class='btn btn-warning' href='".BASE_URL."categories/edit/".$key."'>Edit Category</a><hr>";
		}
		if($category['categoryID'] > 0) {
			?><form action="<?php echo BASE_URL; ?>categories/update" method="post">
				<h4>Edit Category</h4>
				<input type="hidden" name="categoryID" value="<?php echo $category['categoryID']; ?>">
				<input type="text" name="categoryname" class="input-sm" id="category" value="<?php echo $category['name']; ?>" required="category">
				<br /><input type="submit" class='btn btn-primary' value="Submit">
			</form>	<?php
		}
		else {
		?><form action="<?php echo BASE_URL; ?>categories/add" method="post">
			<label for="category">New Category</label>
			<input type="text" name="category" class="input-sm" id="category"  required="category"><br />
			<input type="submit" class='btn btn-primary' value="Submit">
		 </form><?php
		}
	 ?>
	 
	 

</div>
<?php include('views/elements/footer.php');?>