<?php
session_start();
if (!isset($_SESSION['sess_user'])) {
  $user=$_SESSION['sess_user'];

}
include "connection_db.php";


$user=$_SESSION['sess_user'];
$id=$_GET['user_id']; 

$sql = "SELECT user_info.email,user_info.user_name,
profile.name,profile.education,profile.experience,profile.rating,profile.university,profile.interest,profile.domain,profile.accomplishment,profile.image,profile.lastname
 FROM user_info inner join profile on user_info.id=profile.id where user_info.id=$id ";



$result = $conn->query($sql);

?>
 
 <?php
if ($result=mysqli_query($conn,$sql))
  {
  // Fetch one and one row
  while ($row=$result->fetch_assoc())
    {

   	  
      $name= $row["user_name"];
      $lname=$row["lastname"];
      $edu =$row["education"];
      $experience= $row["experience"];
      $email=$row["email"];
      $rating=$row["rating"];
      $uni=$row["university"]; 
      $interest=$row["interest"];
      $domain=$row["domain"];
      $accom=$row["accomplishment"];
      $image=$row["image"];
    }
  // Free result set
  mysqli_free_result($result);
}


        ?>
 <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <title>Profiles - TheCounsellor</title>
   <meta name="description" content="Website for Counselling">
   <meta name="author" content="Maaz">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" href="images/icon.png">
   <link rel="stylesheet" href="css/style.css">

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

<div class="main supporting" id="zen-supporting" role="main">

        
           
            <br>
            
        
            <br>
            <?php             $sql1 ="SELECT image FROM profile where id='$id'";
$result = $conn->query($sql1);

 while ($row = mysqli_fetch_array($result))
{   
   if($user!=5){
echo "<a  href=msg_send.php?user=$id> <button type=submit  class='button button2' style=float:left;> Send Message</button></a>";
   
 }

 echo '<img class=proavatar src="data:image;base64,'.$row["image"].' ">';

} ?>
            <!-- <img src="images/kawasaki.jpg" class="proavatar"/>   -->
                <!-- <a style="margin-left: 70%" href="inbox.php"> <button type="button"  class="button button2" > Inbox</button></a> -->
            
             <!-- <button  style="margin-left: 80%" class="button button2">Take this counsellor</button> -->
            
           
            <h3 style="margin-left: 10%"> <?php echo "<p> $lname</p>"  ?></h3>
            
         
          
            <h5 style="margin-left: 10%"><?php
             for($j=0;$j<$rating;$j++){
             
             echo "<span style=font-size:190%;color:#195199;>&starf;</span>";
              
            }?></h5>
            
         
         
     <table class="text" border= "1px solid" style="margin-left: 10%;">
        <tr >
        
        <td><h2 style= "text-align: left;">Experience</h2><br>
        <h4 class="p"><?php echo $experience?></h4>
        </td> 
      
        </tr>

        <tr><td><h2 style= "text-align: left;">Education</h2><h4 class="p"><?php echo $edu?>
        </td></tr> 
        <tr><td><h2 style= "text-align: left;" >University</h2><h4 class="p"><?php echo $uni ?></h4>
        </td></tr>
        <tr><td><h2 style= "text-align: left;">Interests/Experties</h2><h4 class="p"><?php echo $interest ?></h4>
        </td></tr>
        <tr><td><h2 style= "text-align: left;">Accomplishment/Certifications</h2><h4 class="p"><?php echo $accom ?></h4>
        </td></tr>
        <tr><td><h2  style= "text-align: left;">Domains</h2><h4 class="p"><?php echo $domain ?></h4>
        </td></tr>
        </table>

<footer>
<?php include "footer.php";?> 

</footer>
</div>
</body>
</html>