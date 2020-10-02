<?php
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";
	
	$db = new database();
	$query = "select * from posts order by id desc";
	$posts = $db->select($query);
?>
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

    <title>myblog admin</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="../main.css" rel="stylesheet">
  </head>

  <body>
	<div class="blog-masthead">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item active" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="posts.php">Add posts</a>
          <a class="blog-nav-item" href="services.php">Add category</a>
          <a class="blog-nav-item" href="about.php">View Blog</a>
          <a class="blog-nav-item" href="contact.php">Logout</a>
        </nav>
      </div>
    </div>

    
    <div class="container">

		<div class="blog-header">
			<center><h2 class="blog-title">Admin panel</h2></center>
		</div>

		<div class="row">

			<div class="col-sm-12 blog-main">
			
			</div><!-- /.blog-main -->
		</div>
	</div>