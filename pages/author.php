<?php include_once "project.php" ?>

<?php
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";

	$db = new database();
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$query = "select * from posts where author ='$id'";
		$posts = $db->select($query);
	}
?>
<?php include_once "../includes/nav.php"?>
    <div class="container">
      <div class="blog-header">
        <h1 class="blog-title">Recent Posts</h1>
      </div>

      <div class="row">
        <div class="col-sm-8 blog-main">
					<?php
					if($posts == true){
					while($row = $posts->fetch_array()):
						$pid = $row["id"];
					?>

						<div class='blog-post'>
							<h2 class='blog-post-title'><?php echo $row['title']; ?></h2>
							<p class='blog-post-meta'><?php echo formatDate($row["date"]); ?></p>

							<p><?php echo substr($row["content"],0,300); if(strlen($row["content"]) > 300) echo("...");?></p>
							<?php
							if(strlen($row["content"]) > 300):
							echo("<a href ='".$loc."single.php?id=".$pid."' class='readmore btn btn-primary' style='float:right'>ReadMore</a>");
							?>
							<?php endif;
							?>
						</div><!-- /.blog-post -->
						<hr />
					<?php
					endwhile;
					?>
					<?php
						}
					else{
						echo("<div class = 'alert alert-warning'>Sorry,no posts found ...</div>");
					}

					?>


        </div><!-- /.blog-main -->
	<?php include_once "../includes/footer.php" ?>
