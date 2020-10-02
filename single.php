<?php include_once "project.php" ?>

<?php
	include_once "lib/config.php";
	include_once "lib/db.php";
	include_once "lib/functions.php";

	$db = new database();
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$query = "select * from posts where id ='$id'";
		$posts = $db->select($query);
		$row = $posts->fetch_array();
		$anm = $row["author"];
		$query1 = "select * from users where user_id ='$anm'";
		$posts1 = $db->select($query1);
		$row1 = $posts1->fetch_array();
	}

?>
<?php include_once "includes/nav.php"?>
    <div class="container">

			<div class="blog-header">
				<h1 class="blog-title txt-yellow">Myblog</h1>
				<p class="lead blog-description"></p>
			</div>

      <div class="row">

        <div class="col-sm-8 blog-main">

				<div class='blog-post'>
					<h2 class='blog-post-title'><?php echo $row['title'];?></h2>
					<p class='blog-post-meta'><?php echo formatDate($row["date"]); ?>
					 by <?php echo("<a href='".$loc."pages/author.php?id=".$row1['user_id']."'>".$row1['name']."</a>");?>
				 </p>

					<p><?php echo $row["content"];?></p>

				</div><!-- /.blog-post -->
				<hr />
				<?php
					$pid=$row["id"];
					$query2 = "select * from likes where pid='$pid'";
					$posts2 = $db->select($query2);
					$countlike=0;
					if($posts2)
						$countlike = $posts2->num_rows;
					
				if(isset($_SESSION["uid"])){
					$uid=$_SESSION["uid"];

					$query1 = "select * from likes where uid ='$uid' and pid='$pid'";
					$posts1 = $db->select($query1);
					if($posts1)
						echo("<span class='liker1'><big><i class='fa fa-thumbs-up txt-yellow'></i></big></span> $countlike");
					else {
						echo("<big><a href='".$loc."pages/chklike.php?u=".$uid."&p=".$pid."' id='liker2'><i class='fa fa-thumbs-up text-primary'></i></a></big> $countlike");
					}
				}
			else{
				echo("<big><a href='".$loc."logsign/login.php'><i class='fa fa-thumbs-up text-primary'></i></a></big> $countlike");
			}
				?>
				</div><!-- /.blog-main -->
	<?php include_once "includes/footer.php" ?>
