<?php
include_once 'classes/user.class.php';
include_once 'classes/registreduser.class.php';
include_once 'classes/adminuser.class.php';

$obj1 = new RegisteredUser('Regular User', 'crdillon');
$obj1->__set('first_name', 'Rob');
$obj1->__set('last_name', 'Dillon');
$obj1->__set('email_address', 'rdillon@iupui.edu');

echo "User Level:&nbsp;".$obj1->__get('user_level')."<br>";
echo "Registered User ID:&nbsp;".$obj1->__get('user_id')."<br>";
echo "Registered User Type:&nbsp;".$obj1->__get('user_type')."<br>";
echo "Registered First Name:&nbsp;".$obj1->__get('first_name')."<br>";
echo "Registered Last Name:&nbsp;".$obj1->__get('last_name')."<br>";
echo "Registered Email:&nbsp;".$obj1->__get('email_address')."<br>";

$obj1->__destruct();

echo "<hr>";

$obj2 = new AdminUser('Administrator', 'dldillon');
$obj2->__set('first_name', 'Della');
$obj2->__set('last_name', 'Dillon');
$obj2->__set('email_address', 'della@test.com');

echo "User Level: ".$obj2->__get('user_level')."<br>";
echo "Admin User ID: ".$obj2->__get('user_id')."<br>";
echo "Admin User Type: ".$obj2->__get('user_type')."<br>";

echo "Admin First Name: ".$obj2->__get('first_name')."<br>";
echo "Admin Last Name: ".$obj2->__get('last_name')."<br>";
echo "Admin Email: ".$obj2->__get('email_address')."<br>";

$obj2->__destruct();


?>