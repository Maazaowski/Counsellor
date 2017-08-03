<?php 

$servername = "localhost";
$username = "root";
$password = ".Rubberband12.";
$dbname = "thecdpda_thecounsellor.io";

$con =mysqli_connect($servername,$username,$password,$dbname);
mysqli_select_db($con,"thecdpda_thecounsellor.io");

if (isset($_POST['Reg_btn'])) {
	
$Username=$_POST['user'];
$Password=$_POST['pas'];
$email=$_POST['email'];

$conpas = $_POST['cpas'];

if ($Password== $conpas) {

 

$sql = "INSERT INTO user_info (user_name, password, email,status)
VALUES ('$Username', '$Password', '$email','Student')";

if ($con->query($sql) === TRUE) {
    
    
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


}
}

	$sql="SELECT id FROM user_info Where user_name ='$Username' 
	AND password ='$Password'";
	$result = $con->query($sql);	
	if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {

      $id=$row["id"];
    }
$sql="INSERT INTO profile (id,name) VALUES ('$id','$Username')";

if ($result = $con->query($sql)) {

	?> <script>  window.alert("User Created");
      window.location.assign("profile_edit.php"); </script> 
<?php
   
}
else
{	
	 echo "Error: " . $sql . "<br>" . $conn->error;
	echo "not updated"; 
}
  // Free result set

//  session_start();
//  $_SESSION['sess_user']=$id;
 
//  header("location:profile_setup.php?id=$id");

  mysqli_free_result($result);
  $con->close();
}

?>
