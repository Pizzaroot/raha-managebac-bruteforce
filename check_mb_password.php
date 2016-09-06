<?php
//extract data from the post
//set POST variables
$url = 'https://raha.managebac.com/sessions';
$fields = array(
	'login' => urlencode($_GET['login']),
	'password' => urlencode($_GET['password']),
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

//excute the connection
curl_exec($ch);

//get the information about the connection
$result = curl_getinfo($ch);

//prints 1 if the login is successful
if ($result['http_code'] == 302)
{
	echo 1;
}
else
{
	echo 0;
}

//close connection
curl_close($ch);
?>