<?php
session_start();
if (!isset($_SESSION['sess_user'] )) {
  $id=$_SESSION['sess_user'];
  $username=$_SESSION['user_name'];
	}

include "connection_db.php";
$user=$_SESSION['sess_user'];
	?>

<!DOCTYPE html>
<html>

 <link rel="stylesheet" href="css/style.css">
 <?php include "header.php";
 ?>

<!-- <?php include 'msg_send.php';?> -->


<!-- SEND NEW MESSAGE -->
<?php if (isset($_GET['user']) && !empty($_GET['user'])) {

?>
  <form method="post" >  
 <?php 
  if (isset($_POST['message']) && !empty($_POST['message'])) {
    $id=$_SESSION['sess_user'];
     $user=$_GET['user'];
    $random_num=rand();
    $message=$_POST['message'];
    
    $sql="SELECT haash from message_group WHERE sender=$id AND receiver=$user OR sender=$user AND receiver=$id";
    $result = $conn->query($sql);
    
  
          if ($result->num_rows >= 1) {
            $row = $result->fetch_assoc();
          $message_code = $row["haash"];



      $sql="INSERT INTO message_group(sender,receiver,haash) VALUES ('$id','$user','$message_code')";
       $result = $conn->query($sql);

  $sqll ="INSERT INTO messages (id,group_haash,from_id,message) VALUES ('','$message_code','$id','$message')";
  $resultt = $conn->query($sqll);   
    
    
  }else
    {
      $sql="INSERT INTO message_group(sender,receiver,haash) VALUES ('$id','$user','$random_num')";
       $result = $conn->query($sql);

  $sqll ="INSERT INTO messages (id,group_haash,from_id,message) VALUES ('','$random_num','$id','$message')";
$resultt = $conn->query($sqll);   

    echo $user , $id,$random_num;

    echo "Converstion Started";
}
 
}
?>
  <br>Enter Message : <br>
    <textarea name="message" rows="7" cols="60"></textarea>
   <br>
     <input type="submit" value="Send" name="submit" style="margin-left: 10%" class="button button2"></button>
</form>


<?php
} else
{ echo "<br><b>select user</b>";
    $sql="SELECT id,user_name from user_info";
  $result = $conn->query($sql);
  if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {

      $cid=$row["id"];
      $cname= $row["user_name"];
      echo "<div><a href='msg_send.php?user=$cid'>$cname</a></div>";
    }
  // Free result set
  mysqli_free_result($result);
}
}
  


?>
<?php
if (isset($_GET['user']) && !empty($_GET['user'])) {
?>	
	<form method="post" >
 	<?php
 	if (isset($_POST['message'])) {
 		# code...
 	}
 	?>

 	Enter Message : <br>
  	<textarea name="message" rows="7" cols="60"></textarea>
 	 <br>
  	 <input type="submit" value="Send" name="submit" style="margin-left: 10%" class="button button2"></button>
  	</form>
<?php include "footer.php"; ?>

<?php
} else
{	
  // echo "<br><b>select user</b>";
		$sql="SELECT id,user_name from user_info";
	$result = $conn->query($sql);
	if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {

      $cid=$row["id"];
      $cname= $row["user_name"];
      // echo "<p><a href='msg_send.php?user=$cid'>$cname</a></p>";
    }
  // Free result set
  mysqli_free_result($result);
}
}
	


?>