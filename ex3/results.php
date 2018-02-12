<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Exercise 3</title>

</head>

<body>
<?php

spl_autoload_register('myAutoloader');


function myAutoloader($className)
{
    $path = 'classes/';

    include $path.$className.'.class.php';
}

myAutoloader('user');
myAutoloader('registereduser');

	if(isset($_POST['register']))
	{

		$obj1 = new registereduser('newuser','regular');
		$obj1->__set('first_name', $_POST["fname"]);
		$obj1->__set('last_name', $_POST["lname"]);
		$obj1->__set('email_address', $_POST["email"]);

		if (is_a($obj1, 'registereduser')) {

		echo "The registered user's first name is:&nbsp;".$obj1->__get('first_name')."<br>";
		echo "The registered user's last name is:&nbsp;".$obj1->__get('last_name')."<br>";
		echo "The registered user's email address is:&nbsp;".$obj1->__get('email_address')."<br>";

		}

		$obj1->__destruct();

		echo "<hr>";
		
		echo "Processing Complete";
	
	}

?>
</body>
</html>
