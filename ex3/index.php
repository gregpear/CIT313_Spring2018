<?php

spl_autoload_register('myAutoloader');


function myAutoloader($className)
{
    $path = 'classes/';

    include $path.$className.'.class.php';
}

myAutoloader('user');
myAutoloader('registereduser');

echo "Before You Fill Out This Form, Let's Do Some Math!:".registereduser::aStaticMethod(10,20)."<br><br>"; 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Exercise 3</title>
<style>
.margin{
	margin-left:55px;
}
.margin1{
	margin-left:57px;
}
.margin2{
	margin-left:33px;
}

</style>
</head>

<body>

<form action="results.php" name="ex3" method="post">

	<label for="fname">First Name:</label>
	<input class="margin" type="text" name="fname" id="fname" /><br /><br />
	<label for="lname">Last Name:</label>
	<input class="margin1" type="text" name="lname" id="lname" /><br /><br />
	<label for="email">Email Address:</label>
	<input class="margin2" type="email" name="email" id="email" /><br /><br />
	<input type="submit" name="register" value="Register" />
	

</form>
</body>
</html>
