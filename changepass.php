<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  header("location:login.php");
  # code...
}


$servername = "localhost";
$username = "thecdpda_sana";
$password = "sana123";
$dbname = "thecdpda_thecounsellor.io";

$user=$_SESSION['sess_user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql="SELECT password FROM user_info Where id='$user'";
$result = $conn->query($sql);

$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$repass=$_POST['repass'];

if($result)
{
   $row = $result->fetch_assoc();
  $dbpassword=$row["password"];
}
if ($dbpassword==$oldpass) {

  if ($newpass==$repass) {
    
    $sql="UPDATE user_info SET password='$repass' where id='$user'";
    $result = $conn->query($sql);
    
?>
    <script type="text/javascript">
      window.alert("Password Changed");
      window.location.assign("profile_edit.php");
    </script>
    <?php
  }
 else
	{
    ?>
    <script type="text/javascript">
      window.alert("Password Not Matched");
      window.location.assign("profile_edit.php");
    </script>
  	<?php 

	}

}
else
{?>
    <script type="text/javascript">
      window.alert("Incorrect Old Password");
      window.location.assign("profile_edit.php");
    </script>
    <?php
}
?>
