  <?php
  session_start();
  if (!isset($_SESSION['sess_user'])) {
    header("location:index.php");

  }
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
  $user=$_SESSION['sess_user'];


  $sql = "SELECT user_info.id,user_info.password,user_info.email,user_info.user_name,
  profile.name,profile.education,profile.experience,profile.rating,profile.university,profile.interest,profile.domain,profile.accomplishment,profile.image,profile.lastname
   FROM user_info inner join profile on user_info.id=profile.id where user_info.id=$user ";



  $result = $conn->query($sql);


  ?>
  <?php
   
  $user=$_SESSION['sess_user'];


  $result = $conn->query($sql);

  if ($result=mysqli_query($conn,$sql))
    {
    // Fetch one and one row
    while ($row=$result->fetch_assoc())
      {

        $id=$row["id"];
        $oldpass=$row["password"];
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
  // $oldpass="";
  $newpass="";
  $repass="";
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

  <?php include "header.php";?>
           
  <br>
  <body>
  

    <form action="changepass.php" method="post">
    
    <table class="text" border= "1px solid"; style="float: right ; margin-top:19.3%; 
     width: 300px; margin-right: 100px;  " >
       <tr><td>
          <h2 style= "text-align: center;">User Name<br><?php echo "$name"?></h2></td></tr>
  <tr><td>
          <h2 style= "text-align: center;">Old Password<br><?php echo "  <input class=txtbox type=password name=oldpass >"?></h2></td></tr>
          <tr><td>
          <h2 style= "text-align: center;">New Password<br><?php echo "  <input class=txtbox type=password name=newpass value='$newpass'>"?></h2></td></tr>
          <tr><td>
          <h2 style= "text-align: center;">Re-enter Password<br><?php echo "  <input class=txtbox type=password name=repass value='$repass' >"?></h2></td>
          </tr>
         
          </table>
           <input  type="submit" value="Change Password" style="float: right ; margin-top:60%; margin-right: -19%;  "  class="button button2"></button>

          </form>





            <?php  echo "<tr><form action=editprofile_process.php method=post>";
            $sql1 ="SELECT image FROM profile where id='$user'";
  $result = $conn->query($sql1);
  ?>


  <?php
   while ($row = mysqli_fetch_array($result))
  {   
     echo '<img class=proavatar src="data:image;base64,'.$row["image"].' "> ';
  }

   echo "  <a href=upload_pic.php ><input class='button button2'  type=button name=image value=Picture picture> </a>"; 
  ?>
              <!-- <img src="images/avatar1.png" class="proavatar"/>  -->
               <h3 style="margin-left: 10%"> <?php echo "<p> $name\t $lname</p>"  ?></h3>
             
               <table  class="text" border= "1px solid"; style=" margin-left: 10%;">
          <tr><td>
          <h2 style= "text-align: left;">Experience<br><?php echo "  <input class=text type=text name=experience value='$experience'>"?></h2></td></tr>
          
          <tr><td><h2 style= "text-align: left;">Education<br><?php echo "  <input class=text type=text name=education value='$edu'placeholder='For Example'>"?></h2></td></tr>

<tr><td><h2 style= "text-align: left;">University<br><?php echo "  <input class=text type=text name=university value='$uni'placeholder='For Example'>"?></h2></td></tr>


          <tr><td><h2 style= "text-align: left;">Interests/Experties<br><?php echo"<input class=text type=text name=interest value='$interest'>"?></h2></td></tr>
          <tr><td><h2 style= "text-align: left;">Accomplishment/Certifications<br><?php echo"<input class=text type=text name=accomplishment value='$accom'>"?></h2></td></tr>
          <tr><td><h2 style= "text-align: left;">Domains<br><?php echo"<input class=text type=text name=domain value='$domain'>"?></h2></td></tr>

        </table>
        <br>
          <input style="float: left; margin-left: 10%;" type="submit" style="margin-left: 10%" class="button button2"></button>  
  
          <?php "</form>"?>
      
<br>







<br>
<br>
<br>
   
<div class="main supporting" id="zen-supporting" role="main">
  <footer>
  <?php include "footer.php";?>    
  </footer> 
</div>
</body>
   </html>
