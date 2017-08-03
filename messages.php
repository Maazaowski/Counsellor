<?php  
session_start();
if (!isset($_SESSION['sess_user'])) {
	header ("location:index.php");
}

$servername = "localhost";
$username = "root";
$password = ".Rubberband12.";
$dbname = "thecdpda_thecounsellor.io";

$conn = new mysqli ($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['sess_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset ="UTF-8">
<title>Messages - TheCounsellor</title>
<meta name="description" content="Website for Counselling">
<meta name="author" content="Maaz">
<meta name="viewport" content="width=device-width, inital-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="images/icon.png">
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php include "header.php"; ?>
<br>
<div>

<?php
$users=array();
$query ="SELECT haash, sender, receiver FROM message_group WHERE sender ='$id' OR receiver='$id'";
$result = $conn->query($query);
$j = 1;

while ($row=$result->fetch_assoc())
{
	$haash=$row["haash"];
	$sender=$row["sender"];
	$receiver=$row["receiver"];

	if ($sender == $id)
	{	
		$select_id = $receiver;
	}
	else
	{	
		$select_id = $sender;
	}

	
	if(! array_search($select_id, $users)){
		$users[] = $select_id;
	}
	$j++;
}
?>
<br>
<br>
<br>
<br>


































