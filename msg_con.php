      <?php
      session_start();
      if (!isset($_SESSION['sess_user'])) {
        header("location:index.php");
        # code...
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
      $id=$_SESSION['sess_user'];
      ?>


<?php

include "connection_db.php";

$sql2 = "SELECT user_info.email,profile.name,profile.lastname,profile.rating,profile.university,profile.domain,user_info.id FROM user_info inner join profile on user_info.id=profile.id and user_info.status='Counsellor' ORDER BY name";
$result2 = $conn->query($sql2);

?>

<?php echo "<table>"; // start a table tag in the HTML

if ($result2=mysqli_query($conn,$sql2))
  {

    
  while ($row1=$result2->fetch_assoc())
    {
  
    $name=$row1["name"];
    $lastname=$row1["lastname"];
    $rating=$row1["rating"];
    $domain=$row1["domain"];
  // Fetch one and one row

   
    }
  // Free result set
  mysqli_free_result($result2);
}
?>

     <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <title>Messages - TheCounsellor</title>
   <meta name="description" content="Website for Counselling">
   <meta name="author" content="Maaz">
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
   <link rel="shortcut icon" href="images/icon.png">
   <link rel="stylesheet" href="css/style.css">

 </head>
      <body>
       
       <?php  include "header.php"; ?>
        <br>
<br>
<br>
       <div>
       <!--  <b>conversation</b> -->
        <?php
        $users=array();
        // echo "select conversation";
        $query="SELECT haash,sender,receiver FROM message_group WHERE sender='$id' OR receiver='$id'";
        $result = $conn->query($query);
        $j = 1;
        while ($row=$result->fetch_assoc())
        {

          $haash=$row["haash"];
          $sender=$row["sender"];
          $receiver= $row["receiver"];



          if ($sender == $id) 
          {
            $select_id=$receiver;
          }
          else
          {
            $select_id=$sender;
          }

   
          if(! array_search($select_id, $users)){
            $users[] = $select_id;
          }
           // echo $j;
          $j++;
        }

        ?>
       <?php 
      

 ?>
      <div style="overflow: auto;"> 

      <table style="float: left ; width: 21%;  display: inline-block ;height: 390px;overflow-y: scroll; overflow-x: hidden;scroll-behavior: smooth; " >

          <?php 
          for ($i=0; $i <count($users) ; $i++) { 



            $sql="SELECT user_name,id FROM user_info WHERE id='$users[$i]'";
            $sql1 = "SELECT haash FROM message_group WHERE sender = '$id' and receiver = '$users[$i]' or sender = '$users[$i]' and receiver = '$id'";
            $result1 = $conn->query($sql1);
            $result = $conn->query($sql);
            $row1=$result->fetch_assoc();
            $row2=$result1->fetch_assoc();
            $selected_username=$row1['user_name'];
            $convo_id = $row2['haash'];


            ?>        
            <a href='msg_con.php?haash=$convo_id'> <tr >

              <td class="back"  ><?php
              $sql1 ="SELECT image,id FROM profile where id='$users[$i]'";
              $result = $conn->query($sql1);

              while ($row = mysqli_fetch_array($result)) 
              {   
              
              
              echo "<a href=view_cprofile.php?user_id=$users[$i] >";
              echo ' <img class=msgpic src="data:image;base64,'.$row["image"].' "></a>';
              echo "<a class=namemsg href='msg_con.php?haash=$convo_id'>    $selected_username </a>";
              }?>
       
             </td>

               <?php
             }
             ?>
           </tr></a></table>
           
           
           <table style="display: inline-block ;width: 50%;height: 390px;overflow-y: scroll; overflow-x: hidden;scroll-behavior: smooth; ,max-width:80% ;">
            <?php
            if (isset($_GET['haash']) && !empty($_GET['haash'])) {
             $hash=$_GET['haash'];
           //echo $hash;
             $query="SELECT user_info.user_name,messages.message,messages.from_id FROM user_info inner join messages on user_info.id=messages.from_id WHERE group_haash='$hash'";
             $result = $conn->query($query);

             if (!$result) {
              throw new Exception("Database Error [{$database->errno}] {$database->error}");
            }

            while ($row = $result->fetch_assoc())
            {
              $msg=array();
              $username=$row["user_name"];
              $from_id=$row["from_id"];
              $message=$row["message"];
           
     
              ?>          
              <tr><?php
              $align;
              if($from_id==$id){?>
         <td class="convotable" style="text-align: right; ">
                <?php 
                $align='right';
                
              }
                else{?>
                <td class="convotable" style="text-align: left;">
                <?php 
                $align='left';
                } 

                   echo "<p style= text-align:$align;width:50em;overflow-wrap:break-word><b>$username</b><br> $message</p>" ?> </td>

                  <?php
                } 

                ?>
              </tr>
            </table>

          </div>
          <?php

          $query="SELECT receiver,sender FROM message_group WHERE haash='$hash'";
          $result = $conn->query($query);
          $row = $result->fetch_assoc();
          $sender=$row["sender"];
          $receiver=$row["receiver"];
          if ($sender == $id) 
          {
            $select_id=$receiver;
          }
          else
          {
            $select_id=$sender;
          }

          ?>  

          <form method="post" >

           <?php  
           if (isset($_POST['message']) && !empty($_POST['message'])) 
           {

            $message=$_POST['message'];
      // $sql="INSERT INTO message_group(sender,receiver,haash) VALUES ('$id','$select_id','$hash')";
      //  $result = $conn->query($sql);

            $sqll ="INSERT INTO messages (id,group_haash,from_id,message) VALUES ('','$hash','$id','$message')";
            $resultt = $conn->query($sqll);   

            header("refresh; url=msg_con.php?haash=$hash");

          }
          ?>
          <p style="margin-left: 22.5%">Enter Message</p>
          <textarea name="message" rows="7" cols="60" style="margin-left: 21.5%" class="msgtextarea"></textarea>
          <br>

          <input  type="submit" value="Send" name="submit" style="margin-left: 63.5%" class="button button2" ></button>
        </form>
        <?php
      }

      ?>

    </div>
    <script>
      function reload(){
        location.reload();
      }
    </script>

  <br>

<div class="main supporting" id="zen-supporting" role="main">
  <footer>
  <?php include "footer.php";?>    
  </footer> 
</div>
</body>
   </html>
