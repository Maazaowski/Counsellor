 
 <!DOCTYPE html>
 <html>

 <body style="background-color: #ecf0f1">

  <ul id="nav" >
   <li id="li" style="padding: 0 "><a style="padding: 6px "  href="index.php"> <img src="images/icon.png" padding  " 2px" width="180" id="l1"></a></li>

   <?php 
   
   include "connection_db.php";?>
    
  <li id="li"><a href="profile.php">My Profile</a></li>
  <li id="li"><a href="counsellors.php">Counsellors</a></li>
  <li id="li"><a href="http://thecounsellor.io/blogs">Blogs</a></li>
  <?php
 
  if (!isset($_SESSION['sess_user'])) {
    header("location:index.php");
     }
     else{
  	?>
  	<li id="li"><a href="msg_con.php">Messages</a></li>   	
    <?php }

  ?>
  <li id="li" style=" float: right;"><a href="logout.php">Logout</a></li>
  </ul>
  
<br>
 </body>
 </html>
 
 
