<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

</body>
</html>
<?php session_start();
if (!isset($_SESSION['sess_user'] )) {
  $id=$_SESSION['sess_user'];
  $username=$_SESSION['user_name'];
}
include "header.php";

$servername = "localhost";
$username = "thecdpda_sana";
$password = "sana123";
$dbname = "thecdpda_thecounsellor.io";
 $random_num=rand();
 $message_code=0;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
$id=$_GET['user'];

?>

<?php
if (isset($_GET['user']) && !empty($_GET['user'])) {

  ?>	
  <form method="post" >
   <?php 	
   if (isset($_POST['message']) && !empty($_POST['message'])) {
    $id=$_SESSION['sess_user'];
    $user=$_GET['user'];
 
    $message=$_POST['message'];
    
    $sql="SELECT haash from message_group WHERE sender=$id AND receiver=$user OR sender=$user AND receiver=$id";
    $result = $conn->query($sql);

    $message_code=0;
    if ($result->num_rows >= 1) {
      $row = $result->fetch_assoc();
      $message_code = $row["haash"];

      $sqll ="INSERT INTO messages (id,group_haash,from_id,message) VALUES ('','$message_code','$id','$message')";
      $resultt = $conn->query($sqll);   

       echo "Message Sent";
    header("location:msg_con.php?haash=$random_num");
    }
    else
    {
    	$sql="INSERT INTO message_group(sender,receiver,haash) VALUES ('$id','$user','$random_num')";
      $result = $conn->query($sql);

      $sqll ="INSERT INTO messages (id,group_haash,from_id,message) VALUES ('','$random_num','$id','$message')";
      $resultt = $conn->query($sqll);  	

      echo "Message Sent";
      header("location:msg_con.php?haash=$random_num");
    }

  }
  ?>
  <br>Enter Message : <br>
  <textarea name="message" rows="7" cols="60"></textarea>
  <br>
  <?php echo "<a href=msg_con.php><input type=submit value=Send name=submit style=margin-left: 10% class='button button2'></a>";?>
</form>


<?php
} 
else

{	echo "<br><b>select user</b>";
$sql="SELECT id,user_name from user_info";
$result = $conn->query($sql);
if ($result=mysqli_query($conn,$sql))
{
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
  {

    $cid=$row["id"];
    $cname= $row["user_name"];
    echo "<p><a href='msg_send.php?user=$cid'>$cname</a></p>";
  }
  // Free result set
  mysqli_free_result($result);
}
}



?>