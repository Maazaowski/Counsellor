<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  header("location:index.php");
  # code...
}

$servername = "localhost";
$username = "root";
$password = ".Rubberband12.";
$dbname = "thecdpda_thecounsellor.io";

$user=$_SESSION['sess_user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="UPDATE profile SET
lastname='$_POST[fullname]',experience='$_POST[experience]',education='$_POST[education]',university='$_POST[university]',interest='$_POST[interest]',accomplishment='$_POST[accomplishment]',domain='$_POST[domain]' WHERE id=$user";


if ($result = $conn->query($sql)) {
	header("refresh:1; url=profile.php");
	# code...
}
else
{	echo "not updated";}




