      <?php
      session_start();
 
$servername = "localhost";
$username = "root";
$password = ".Rubberband12.";
$dbname = "thecdpda_thecounsellor.io";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      } 
      $id=$_SESSION['sess_user'];
      ?>

<?php

include "connection_db.php";

$sql = "SELECT user_info.email,profile.name,profile.lastname,profile.rating,profile.university,profile.domain,user_info.id FROM user_info inner join profile on user_info.id=profile.id and user_info.status='Counsellor' ORDER BY name";
$result = $conn->query($sql);

?>

<?php echo "<table>"; // start a table tag in the HTML

if ($result=mysqli_query($conn,$sql))
  {

    
  while ($row=$result->fetch_assoc())
    {
  
    $name=$row["name"];
    $lastname=$row["lastname"];
    $rating=$row["rating"];
    $domain=$row["domain"];
  // Fetch one and one row

   
    }
  // Free result set
  mysqli_free_result($result);
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <link href="css/style.css" rel="stylesheet">
    <script src="Messages/script2.js"></script>
    <script src="Messages/script.js"></script>
  </head>
    <body>

<?php if ($result=mysqli_query($conn,$sql))
  {

    $name=array();
    $id=array();
    $lastname=array();
    $rating=array();
    $domain=array();
    $university=array();
         # code...
    $i=1; 
 while ($row=$result->fetch_assoc())
    {    
    $id[$i]=$row["id"]; 
    $name[$i]=$row["name"];
    $lastname[$i]=$row["lastname"];
    $rating[$i]=$row["rating"];
    $domain[$i]=$row["domain"];
    $university[$i]=$row["university"];
    $i++;
    }
}
?>



  
  <div class="chat_box">
	<div class="chat_head"> Chat </div>
	<div class="chat_body" style="overflow-y: scroll; overflow-x: hidden;scroll-behavior: smooth;"> 

<?php  
for($i=1;$i<=count($name);$i++)
{ 


   ?>

	<div class="users"> <?php $sql1 ="SELECT image FROM profile where id='$id[$i]'";
$result = $conn->query($sql1);
 while ($row = mysqli_fetch_array($result))
{   
   echo '<img style="margin-left:-6px;" class=chatavatar src="data:image;base64,'.$row["image"].' ">';
} ?> <?php echo $name[$i] .' ' .  $lastname[$i]; ?></div>


	

<?php } ?>
</div>
  </div>

<div class="msg_box" style="right:290px">
	<div class="msg_head">Syed Muhammad Maaz
	<div class="close">x</div>
	</div>
	<div class="msg_wrap">
		<div class="msg_body">
			<div class="msg_a">Hi my name is what?	</div>
			<div class="msg_b">My name is who?</div>
			<div class="msg_a"> My name is *chika chika* Slim Shady</div>	
			<div class="msg_a">Hi my name is what?	</div>
			<div class="msg_b">My name is who?</div>
			<div class="msg_a"> My name is *chika chika* Slim Shady</div>	
			<div class="msg_a">Hi my name is what?	</div>
			<div class="msg_b">My name is who?</div>
			<div class="msg_a"> My name is *chika chika* Slim Shady</div>	
			<div class="msg_push"></div>
		</div>
	<div class="msg_footer"><textarea class="msg_input" rows="4"></textarea></div>
</div>
</div>
</body>
</html>
