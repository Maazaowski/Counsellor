<?php

if (!isset($_SESSION['sess_user'])) {
  echo "no user id";
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



<!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <title>Edit Profile - TheCounsellor</title>
   <meta name="description" content="Website for Counselling">
   <meta name="author" content="Maaz">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" href="images/icon.png">
   <link rel="stylesheet" href="css/style.css">

 </head>


 <?php

  include ("header.php");

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
 
 ?>
            <center>
           <h1>Setting Up Your Profile</h1>
           </center>
           <br>
        <form action=profilesetup_process.php method=post>
        <!--    <a href="upload_pic.php"><input type="button" name="upload" class="button button2" value="Upload Picture" style="margin-left: 10%"></a> -->
        <h3 style="margin-left: 10%"><?php echo $name ?></h3>
        <h5 style="margin-left: 13%"><?php echo "Rating" ?></h5>
        <table class="text" border= "1px solid" style="margin-left: 10%;">
        <tr><td>  <h2  style="text-align: left;" >Full Name<br><input class=txtbox  id=mar type=text name="lastname" ></h2></td></tr>
        
        <tr><td>
        <h2 style= "text-align: left;">Experience<br><input class=txtbox id=mar type=text name="experience" ></h2></td></tr>
        
        <tr><td><h2 style= "text-align: left;">Education<br><input class=txtbox id=mar type=text name="education" ></h2></td></tr>
        <tr><td><h2 style= "text-align: left;">University<br><input class=txtbox id=mar type=text name="university" ></h2></td></tr>
        <tr><td><h2 style= "text-align: left;">Interests/Experties<br><input class=txtbox id=mar type=text name="interest"></h2></td></tr>
        <tr><td><h2 style= "text-align: left;">Accomplishment/Certifications<br><input class=txtbox id=mar type=text name="accomplishment" ></h2></td></tr>
        <tr><td><h2 style= "text-align: left;">Domains<br><input class=txtbox id=mar type=text name="domain"></h2></td></tr>
                
  
  </table>
     
        <br><br>
     <input type="submit" name="submit" style="margin-left: 10%" class="button button2"></button>
    </form>
<br>

<div class="main supporting" id="zen-supporting" role="main">
  <footer>
  <?php include "footer.php";?>    
  </footer> 
</div>
</body>
   </html>
