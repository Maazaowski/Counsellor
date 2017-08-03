 <?php 


$con =mysqli_connect("localhost","root",".Rubberband12.","thecdpda_thecounsellor.io");
mysqli_select_db($con,"thecdpda_thecounsellor.io");


if(isset($_GET['user'])&& !empty($_GET['user']))
{
	$username="";
	$password="";
}
else
{ 
$username= strip_tags($_POST['User_name']);
$password= strip_tags($_POST['Pass_word']);
}




$sql="SELECT user_name,password FROM user_info Where user_name ='$username' 
AND password ='$password'";
$result = $con->query($sql);


if($result)
{
	$row = $result->fetch_assoc();
	
	$dbusername= $row["user_name"];
	$dbpassword=$row["password"];
}

if($username==$dbusername  && $password== $dbpassword)
{
	$sql="SELECT id,user_name FROM user_info Where user_name ='$username' 
	AND password ='$password'";
	$result = $con->query($sql);	
	if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {

      $id=$row["id"];
      $username=$row["user_name"];
    }
  // Free result set
  mysqli_free_result($result);
}
	session_start();
	$_SESSION['sess_user']=$id;
	$_SESSION['user_name']=$username;
	
	header("Location:index.php");

	
}
else
{
	?>
<script>
    confirm('Incorrect Username or Password');
    window.location= 'login.php';

</script>
<?php
 } ?>
  
  

