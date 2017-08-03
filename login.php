<?php 
error_reporting(E_ALL & ~E_NOTICE);
session_start();
?>

 <!DOCTYPE html>
 <html>
 <head>
     <link rel="shortcut icon" href="images/icon.png">
     <title>Sign in</title>
 

<link rel="stylesheet" href="css/style.css">

 </head>
<body style="background-color: #ecf0f1">

  <ul id="nav">
  <li id="li" style="padding: 0px; background-color:#white;"><a style="padding: 6px "></a></li>
 

  </ul>
<br></br>

 

   <center>
    <h1><a href="index.php"><img src="images/logo.png" padding  " 2px" width="25%" style="margin-left: -40px;"></a></h1>
            <h2>Sign in</h2>
           
            <br></br>
      <form action="login_process.php" class="SignIn_form"  method="post">
      
       <label class="l1"><b>Username</b></label><br>
       <input class="user" type="text" name="User_name" >
       <br></br>

       <label class="l1"><b>Password</b></label><br>
       <input type="password" class="pass" name="Pass_word">
       <br></br>

 
       <br>
      
      <button type="submit" class="loginbutton button2">Login</button>    
      
      
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
