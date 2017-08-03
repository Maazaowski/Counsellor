  <?php
 
  session_start();
  include "connection_db.php";
 
  if (!isset($_SESSION['sess_user'])) {
   $_SESSION['sess_user'] = "5";
  $user=5;

}
?>
  <?php

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
  // Free result set
  // mysqli_free_result($result);
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>TheCounsellor</title>
        <link rel="shortcut icon" href="images/icon.png">
	<link rel="stylesheet" media="screen" href="css/style.css?v=8may2013">

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
include "chat.php";

}?>


<body id="css-zen-garden">
<div class="page-wrapper">

	<section class="intro" id="zen-intro">
		<header role="banner">
			<h1>The Counsellor</h1>
			<h2>*insert motto*</h2>
		</header>

		<div class="summary" id="zen-summary" role="article">
			<h2 style="float:left;">Seek guidance for free now</h2>
                       
<br><br><br>
                        <?php
 $user=$_SESSION['sess_user'];
if($user==5){ ?>
 <a href="Register.php"><button type="button" style="float: left; padding: 1% 4%; font-size: 150%; font-family:'Lato', sans-serif;" class="button button2">Register</button></a>
<?php }
else{

}?>

			
		</div>
<br>
		<div class="preamble" id="zen-preamble" role="article">
		
			<h3>What is Counselling?</h3>
			<p>Counselling is a type of talking therapy that allows a person to talk about their problems and feelings in a confidential and dependable environment. A counsellor is trained to listen with empathy (by putting themselves in your shoes). They can help you deal with any negative thoughts and feelings you have.</p>
			<p>Sometimes the term "counselling" is used to refer to talking therapies in general, but counselling is also a type of therapy in its own right.</p>
			<p>Other psychological therapies include psychotherapy, cognitive behavioural therapy (CBT), and relationship therapy, which could be between members of a family, a couple, or work colleagues.</p>
		</div>
	</section>

	<div class="main supporting" id="zen-supporting" role="main">
		<div class="explanation" id="zen-explanation" role="article">
<br>
			<h3>So What is This About?</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
<br><br><br><br>

		<div class="participation" id="zen-participation" role="article">
			<h3>What is Lorem Ipsum?</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
			<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
		</div>

		<div class="benefits" id="zen-benefits" role="article">
			<h3>Where does it come from?</h3>
			<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
		</div>

		<div class="requirements" id="zen-requirements" role="article">
			<h3>Standard Lorem Ipsum passage</h3>
			<p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
			<p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"</p>
			<p>"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"</p>
			<p>Glorious! And I won't give in, and I wont give in till I'm victorious. And I will defend, I will defend.</p>
		</div>

		<footer>
  <?php include "footer.php"; ?>
  </footer>

	</div>


<div class="extra1" role="presentation"></div><div class="extra2" role="presentation"></div><div class="extra3" role="presentation"></div>
<div class="extra4" role="presentation"></div><div class="extra5" role="presentation"></div><div class="extra6" role="presentation"></div>

</body>
</html>
