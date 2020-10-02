<?php include_once "project.php" ?>

<?php
	include_once "lib/config.php";
	include_once "lib/db.php";
	include_once "lib/functions.php";

	$db = new database();
	if(isset($_GET["id"])){
		$id = $_GET["id"];
		$query = "select * from posts where cat_id ='$id' order by id desc";
		$posts = $db->select($query);
	}

	if(isset($_GET["pgno"])){
		$cur_pg=$_GET["pgno"];
	}
	else{
		$cur_pg=1;
	}
	$db->setpage($cur_pg);
	$pager = $db->paging($_GET["id"],"");
	$query .=" limit ".(($cur_pg-1)*10).",10";
	$posts = $db->select($query);
?>

<?php include_once "includes/nav.php"?>

    <div class="container">

      <div class="blog-header">
        <h1 class="blog-title txt-yellow">Myblog</h1>
        <p class="lead blog-description"></p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
			<?php
			if($posts == true){
			while($row = $posts->fetch_array()):
			$anm = $row["author"];
			$query1 = "select * from users where user_id ='$anm'";
			$posts1 = $db->select($query1);
			$row1 = $posts1->fetch_array();
			?>

				<div class='blog-post'>
					<h2 class='blog-post-title'><?php echo $row['title']; ?></h2>
					<p class='blog-post-meta'><?php echo formatDate($row["date"]); ?> by <a href='#'><?php echo $row1["name"]; ?></a></p>

					<p><?php echo substr($row["content"],0,300); if(strlen($row["content"]) > 300) echo("...");?></p>
					<?php
					if(strlen($row["content"]) > 300): ?>
						<a href='single.php?id=<?php echo $row["id"];?>' class='readmore btn btn-primary' style="float:right">Read More </a>
					<?php endif;
					?>

				</div><!-- /.blog-post -->
				<hr />
			<?php
			endwhile;
			echo $pager
			?>

			<?php
				}
			else{
				echo("<div class = 'alert alert-warning'>no posts found for selected category</div>");
			}

			?>
        </div><!-- /.blog-main -->
	<?php include_once "includes/footer.php" ?>
