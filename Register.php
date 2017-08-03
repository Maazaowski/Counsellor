<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>

 <!DOCTYPE html>
 <html>
 <head>
     <link rel="shortcut icon" href="images/icon.png">
     <title>Register</title>
 

<link rel="stylesheet" href="css/style.css">

 </head>
<body style="background-color: #ecf0f1">

  <ul id="nav">
  <li id="li" style="padding: 0px; background-color:white;"><a style="padding: 6px "></a></li>
 

  </ul>
<br></br>

 

   <center>
    <h1><a href="index.php"><img src="images/logo.png" padding  " 2px" width="25%" style="margin-left: -40px;"></a></h1>
            <h2>Registration</h2>
           
            <br></br>
      <form action="Register_process.php" class="Login_form"  method="post">
      
       <label class="l1"><b>Username</b></label><br>
       <input name="user" type="text" class="txtbox" placeholder="Username" required/>
       <br></br>

       <label class="l1"><b>Password</b></label><br>
       <input name="pas" type="Password" class="txtbox" placeholder="Password" required/>
       <br></br>

       <label class="l1"><b>Re-enter Password</b></label><br>
       <input name="cpas" type="Password" class="txtbox" placeholder="Confirm Password" required/>
       <br></br>

        <label class="l1"><b>Email</b></label><br>
       <input name="email" type="text" class="txtbox" placeholder="Email" required/>
       <br></br>

      <!-- <label class="l1"><b>Register As</b></label><br><br> -->
     <!-- <input  class="radio" type="radio" name="status" value="Student" checked><span>Student     </span> -->
     <!-- <input class="radio" style="margin-left: 3%;" type="radio" name="status" value="Counsellor"><span >Counsellor</span><br> -->
 
       <br>
      
      <button type="submit" class="button button2" name="Reg_btn">Sign up</button>    
      <a href="index.php"><button style="margin-left: 18px;" type="button" class="button button2">Back</button></a>
      
   </form>
<br>
<!-- <div style="border: 1px solid;">For Registration of Counsellor, send your RESUME to<a href=""></a> m_sarim_i@hotmail.com </div> -->
</center> 
<div class="main supporting" id="zen-supporting" role="main">
 <footer>
  <?php include "footer.php"; ?>
  </footer>
</div>
 </body>

 </html>