   <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo BASE_URL?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL?>views/js/bootstrap.min.js"></script>
   <?php
   if($u->isAdmin()) {
       ?>
   <script src="<?php echo BASE_URL?>application/plugins/tinyeditor/tiny.editor.packed.js"></script>
   <script>
       var editor = new TINY.editor.edit('editor', {
           id: 'tinyeditor',
           width: 584,
           height: 175,
           cssclass: 'tinyeditor',
           controlclass: 'tinyeditor-control',
           rowclass: 'tinyeditor-header',
           dividerclass: 'tinyeditor-divider',
           controls: ['bold', 'italic', 'underline', 'strikethrough', '|', 'subscript', 'superscript', '|',
               'orderedlist', 'unorderedlist', '|', 'outdent', 'indent', '|', 'leftalign',
               'centeralign', 'rightalign', 'blockjustify', '|', 'unformat', '|', 'undo', 'redo', 'n',
               'font', 'size', 'style', '|', 'image', 'hr', 'link', 'unlink', '|'],
           footer: true,
           fonts: ['Verdana','Arial','Georgia','Trebuchet MS'],
           xhtml: true,
           cssfile: 'custom.css',
           bodyid: 'editor',
           footerclass: 'tinyeditor-footer',
           toggle: {text: 'source', activetext: 'wysiwyg', cssclass: 'toggle'},
           resize: {cssclass: 'resize'}
       });


   </script>

<?php   }
?>
		<script>
				$(document).ready(function(){
					
					$('.post-loader').click(function(event){	
						event.preventDefault();
						var el = $(this);
						
						$.ajax({	
							url:el.attr('href'),
							type:'GET',
							success:function(data){
								el.parent().append(data);
								el.remove();
								}			
						});
					});
				});		
				$(document).ready(function(){
					var postid = {id:$('#pid').val()}
	
					if(postid.id != 'undefined'){
						getComments();
					}
					//get comments
					function getComments(){
						
						$.ajax({
						url:"<?php echo BASE_URL; ?>ajax/getComments",
						data: postid,
						type:"POST",
						success: function(response){
							
							$('#cmain').html('').append(response);
			
							$('.moveleft').click(function(e){
								e.preventDefault();
								//var tester = $(this).parent().find("#commentID").val();
								
								var cmmid = {id:$(this).parent().find("#commentID").val()};
			
								$(this).parent().slideUp(function(){
									$(this).remove();
								});
								//alert(cmmid);
								$.ajax({
									url: "<?php echo BASE_URL; ?>ajax/deleteComment",
									type:"POST",
									data: cmmid
								});
							});
						}
						});
					}
			
					$('.post').click(function(e){
						e.preventDefault();
			
						var el = $(this);
			
						$.ajax({
							url: el.attr('href'),
							type: 'GET',
							success: function(data){
								el.parent().append(data);
								el.remove();
							}
						});
					});
			
					$('#submitComment').click(function(e){
						e.preventDefault();
			
						var data = {data:$('#textComment').val(),
									userid: $('#uid').val(),
									postid: $('#pid').val()
									}
			
						$.ajax({
							url:"<?php echo BASE_URL; ?>ajax/postComment",
							type: "POST",
							data: data,
							success: function(){
								$('#textComment').val('');
								getComments();
			
							}
						});
					});
				});
        
		</script>


<script> 
function validateForm()
{

  var requiredFields = ["first_name","last_name","email", "password", "confirmpassword"];
  
  var errorFields = [];
  var errorMessages = [];
  

  for (i = 0; i < requiredFields.length; i++)
  {
    var formFieldValue = document.forms["registration_form"][requiredFields[i]].value;
  
    if (checkEmpty(formFieldValue))
    {
      
      errorFields.push(requiredFields[i]);
      
      errorMessages.push(requiredFields[i] + " is a required field.");
    }
  }
  
  var pass1 = document.getElementById("password").value;
  var pass2 = document.getElementById("confirmpassword").value;

  if (isPasswordMatch(pass1, pass2) == false)
  {

      var ArrayLength = requiredFields.length;

      errorFields.push(requiredFields[1]);
      errorMessages.push("Password and Password Confirmation does not match");
  }


  
  if (errorFields.length > 0)
  {

    for (i = 0; i < errorFields.length; i++)
    {
      var errorElement = document.getElementById(errorFields[i]);
      errorElement.className += " hasError";
    }
    
    var allErrorMessages = "";
    
    for (i = 0; i < errorMessages.length; i++)
    {
      allErrorMessages += errorMessages[i] + "<br/>";
    }
    

    document.getElementById("errorList").innerHTML = allErrorMessages;
    
    document.getElementById("errorList").style.display = "inherit";
    
    return false; 
  }
  else 
  {
    return true; 
  }
  
  
}

function checkEmpty(incomingValue)
{
  if (incomingValue == null || incomingValue == "")
  {
    return true;
  }
  else
  {
    return false;
  }
}

function isPasswordMatch(passwordOne, passwordTwo)
{

    if (passwordOne == passwordTwo)
    {
        return true;
    }
    else
    {

        return false;
    }
}

</script>
<script type="text/javascript">
function validateForm1()
{

  var requiredFields = ["title","category","date","tinyeditor"];
    
  
  var errorFields = [];
  var errorMessages = [];
  

  for (i = 0; i < requiredFields.length; i++)
  {
    
    
    var formFieldValue = document.forms["addpostform"][requiredFields[i]].value;
    
  
    if (checkEmpty(formFieldValue))
    {
    
      errorFields.push(requiredFields[i]);
      
      errorMessages.push(requiredFields[i] + " is a required field.");

    }
  }
  
  
  if (errorFields.length > 0)
  {
 
    for (i = 0; i < errorFields.length; i++)
    {
 
      var errorElement = document.getElementById(errorFields[i]);
      errorElement.className += " hasError";
    }
    
    var allErrorMessages = "";
    
    for (i = 0; i < errorMessages.length; i++)
    {
      allErrorMessages += errorMessages[i] + "<br/>";
    }
 
    document.getElementById("errorList").innerHTML = allErrorMessages;
    document.getElementById("errorList").style.display = "inherit";
    
    return false; 
  }
  else 
  {
    return true; 
  }
}

function checkEmpty(incomingValue)
{
  if (incomingValue == null || incomingValue == "")
  {
    return true;
  }
  else
  {
    return false;
  }
}

</script>

  </body>
</html>