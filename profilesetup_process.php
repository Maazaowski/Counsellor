<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  header("location:index.php");
  # code...
}

$servername = "localhost";
$username = "thecdpda_sana";
$password = "sana123";
$dbname = "thecdpda_thecounsellor.io";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$user=$_SESSION['sess_user'];


$sql = "SELECT user_name,id
 FROM user_info where id=$user ";



$result = $conn->query($sql);

?>
 <?php
if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {
      $name= $row["user_name"];
      $id= $row["id"];
     }
  // Free result set
  mysqli_free_result($result);
}
 

$servername = "localhost";
$username = "thecdpda_sana";
$password = "sana123";
$dbname = "thecdpda_thecounsellor.io";

$updatebtn="yo";

$user=$_SESSION['sess_user'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['submit'])) {
	# code...

	    $lname=$_POST['lastname'];
      $edu =$_POST['education'];
      $experience=$_POST['experience'];
      $uni=$_POST['university']; 
      $interest=$_POST['interest'];
      $domain=$_POST['domain'];
      $accom=$_POST['accomplishment'];
      
      $sql="INSERT INTO profile (id,name,lastname,experience,education,university,interest,accomplishment,domain) VALUES ('$id','$name','$lname','$experience','$edu','$uni','$interest','$accom','$domain')";

if ($result = $conn->query($sql)) {
	echo "Inserted";
	header("refresh:1; url=profile.php");
	# code...
}
else
{	
	 echo "Error: " . $sql . "<br>" . $conn->error;
	echo "not updated"; 
}
}



?>
  

 
   