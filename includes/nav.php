
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php echo("<link href='".$loc."css/main.css' rel='stylesheet'>");?>
	<?php echo("<link href='".$loc."css/log.css' rel='stylesheet'>");?>
	<?php echo("<link href='".$loc."css/add.css' rel='stylesheet'>");?>

  </head>

  <body>
 <div class ="blog-masthead">
 <nav class="navbar navbar-inverse" style="margin:0px;border-radius:0px">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
		<?php echo("<a class='navbar-brand' href ='".$loc."index.php'><img src ='".$loc."images/logo.jpeg' width=150px></a>");?>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
		<?php echo("<li><a href ='".$loc."index.php'>Home</a></li>");?>
		<?php echo("<li><a href ='".$loc."pages/about.php'>About Us</a></li>");?>
		<?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();

		}
		if(isset($_SESSION["uid"])){
			$uid=$_SESSION["uid"];
			echo("<li><a href ='".$loc."pages/author.php?id=".$uid."'>My posts</a></li>");
		}
		?>
		<?php echo("<li><a href ='".$loc."pages/contact.php'>Contact Us</a></li>");?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		if(!isset($_SESSION["uid"])){
			echo("<li><a href='".$loc."logsign/signup.php'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>");
			echo("<li><a href='".$loc."logsign/login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>");
		}
		else{
			$id = $_SESSION["uid"];
			$query1 = "select * from users where user_id ='$id' limit 1";
			$posts1 = $db->select($query1);
			$row1 = $posts1->fetch_array();
			$nm =$row1["name"];
			echo("<li><a href=''><span class=''></span> Hi ! ".$nm."</a></li>");
			echo("<li><a href='".$loc."logsign/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>");

		}
		?>
      </ul>
    </div>
  </div>
</nav>
</div>
