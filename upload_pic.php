<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  
$user=$_SESSION['sess_user'];
}
include "connection_db.php";
$user=$_SESSION['sess_user'];

?>
<!--  -->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
	<title>upload picture</title>
</head>
<?php include "header.php";?>
<body>
<form  method="POST" enctype="multipart/form-data">
<input type="file" name="filetosave" class="button button2" >
<a href="profile_edit.php"><input type="submit" class="button button2" name="insert" id="insert"></a>
</form>
</body>
</html>


<?php
if (isset($_POST['insert'])) {
if (getimagesize($_FILES['filetosave']['tmp_name'])==false)
 {
  echo "Please insert new image";
}
else{
  $imagename = ($_FILES['filetosave']['tmp_name']);
  $name = addslashes($_FILES['filetosave']['name']);
  $imagename = file_get_contents($imagename);
  $imagename = base64_encode($imagename);
$sql= "UPDATE profile SET image='$imagename' where id='$user'";

  
if ($result = $conn->query($sql)) {
  echo "<br/> Image saved <br>";
}
else
{ echo "<br>Not updated";}
  
}
}
$sql1 ="SELECT image FROM profile where id='$user'";
$result = $conn->query($sql1);
 while ($row = mysqli_fetch_array($result))
{		
   echo '<img src="data:image;base64,'.$row["image"].' ">';
}

?>