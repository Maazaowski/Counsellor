<?php
session_start();
 if (!isset($_SESSION['sess_user'])) {
  $user=$_SESSION['sess_user'];

}?>
<?php

include "connection_db.php";

$sql = "SELECT user_info.email,profile.name,profile.lastname,profile.rating,profile.university,profile.domain,user_info.id FROM user_info inner join profile on user_info.id=profile.id and user_info.status='Counsellor' ORDER BY rating DESC";
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
	<meta charset="utf-8">
	<title>Counsellors</title>
        <link rel="shortcut icon" href="images/icon.png">
	<link rel="stylesheet" media="screen" href="css/style.css">
	

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Syed Muhammad Maaz">
	<meta name="description" content="A platform for students to seek advice from counsellors">
	<meta name="robots" content="all">
</head>
<?php
 $user=$_SESSION['sess_user'];
if($user==5){
 include "guest_header.php";
}
else{
include "header.php";


}?>


<body>
    <div class="page-wrapper">

	<section class="intro" id="zen-intro">
		<header role="banner">
			<h1>The Counsellor</h1>
			<h2>*insert motto*</h2>
		</header>

		<div class="summary" id="zen-summary" role="article">
			<p>*insert super inspiring quote here*</p>
			
		</div>

</section>

<div class="main supporting" id="zen-supporting" role="main">


 
 
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

<?php  
for($i=1;$i<=count($name);$i++)
{ 


   ?>

<div class="card"><?php echo "<a href=view_cprofile.php?user_id=$id[$i]>";?>
 
<?php             $sql1 ="SELECT image FROM profile where id='$id[$i]'";
$result = $conn->query($sql1);
 while ($row = mysqli_fetch_array($result))
{   
   echo '<img style="margin-left:-6px;" class=proavatar src="data:image;base64,'.$row["image"].' ">';
} ?>
  
  <div class="container">

      <p  class="title"><?php echo $domain[$i] ; ?> </p> 
    <h2 style="margin-left: 10%; text-align: left;"> <?php echo $lastname[$i]; ?> </h2>
    
    <p class="title"><?php
    if ($rating[$i]==NULL) {

     echo "<span style=font-size:190%;color:dark yellow;>&#9734;</span>";
    }else{
      for($j=0;$j<$rating[$i];$j++)
      {
             
               echo "<span style=font-size:190%;color:#195199; border:1px solid;>&starf;</span>";
              
      }
            } 
     ?> </p> 
     

  </div>


</div>
<!--  <? ?> -->
<?php } ?>

<footer>
<?php
include "footer.php";?> 
</footer>
</div>

<div class="extra1" role="presentation"></div><div class="extra2" role="presentation"></div><div class="extra3" role="presentation"></div>
<div class="extra4" role="presentation"></div><div class="extra5" role="presentation"></div><div class="extra6" role="presentation"></div>

</body>

</html>
