<?php include('views/elements/header.php');?>
<div class="container">
	<div class="page-header">
   <h1>Add Post</h1>
  </div>
   
  <?php if($message){?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    	<?php echo $message?>
    </div>
  <?php }?>
  <div id="errorList" class="alert alert-error"></div>
  <div class="row">
      <div class="span8">
        <form action="<?php echo BASE_URL?>manageposts/<?php echo $task?>" id="addpostform"  method="post" onsubmit="editor.post()">
          <label>Title</label>
          <input type="text" class="span6" name="title" id="title" value="" >
     	  
          <label for="date">Date</label>
          <?php // set timezone
date_default_timezone_set('America/Indiana/Indianapolis');?>
          <input name="date" id="date" size="16" type="date" value="">
          
          <label for="category">Category</label>
          <select class="input-sm" name="category" id="category" >
          <option value="">-- Select Category --</option>
          
          <?php
            foreach($categories as $key => $value){
              if($category == $key){
				  echo "<option selected value='".$key."'>".$value."</option>" . "\n";
              }
              else {
				  echo "<option value='".$key."'>".$value."</option>" . "\n";
              }
			 
			}
          ?>
          
          </select>
        
          <label>Content</label>
          <textarea id="tinyeditor" name="content" style="width:556px;height: 200px"></textarea>
    			<br/>
          <input type="hidden" name="pID" value=""/>
          
          <button id="submit" type="submit" class="btn btn-primary" onclick="return validateForm1();" >Submit</button>
        </form>

        
      </div>
    </div>
</div>
<?php include('views/elements/footer.php');?>

