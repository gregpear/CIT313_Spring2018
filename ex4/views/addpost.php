<?php include('elements/header.php');?>

<div class="container">
	<div class="page-header">
   <h1> the Add Post View </h1>
  </div>
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>addpost/<?php echo $task?>" method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="post_title" value="<?php echo $title?>">
          <label for="date">Date</label>
                    <input name="date" id="date" size="16" type="date" value="<?php echo $date; ?>">
          
          <label for="category">Category</label>
          <select class="input-sm" name="category" id="category" required="category">
                  <option value="" <?php if($categoryID == "") echo 'selected'; ?>>-- Select Category --</option>
                
                  <option value='1' <?php if($categoryID == "1") echo 'selected'; ?> >Techstuffs</option>
                  <option value='2' <?php if($categoryID == "2") echo 'selected'; ?> >Weather</option>
                  <option value='3' <?php if($categoryID == "3") echo 'selected'; ?> >Sports</option>
                
          </select>

     			<label>Content</label>
          <textarea id="tinyeditor" name="post_content" style="width:556px;height: 200px"><?php echo $content?></textarea>
    			<br/>
          <input type="hidden" name="pID" value="<?php echo $pID?>"/>
          <button id="submit" type="submit" class="btn btn-primary" >Submit</button>
        </form>

        
      </div>
    </div>
</div>
<?php include('elements/footer.php');?>

