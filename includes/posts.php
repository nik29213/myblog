
<br />
<br />
    <div class="container">

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
					<p class='blog-post-meta'><?php echo formatDate($row["date"]); ?>
            by <?php echo("<a href='".$loc."pages/author.php?id=".$row1['user_id']."'>".$row1['name']."</a>");?>

					<p><?php echo substr($row["content"],0,300); if(strlen($row["content"]) > 300) echo("...");?></p>
      		<?php
					if(strlen($row["content"]) > 300): ?>
						<a href='single.php?id=<?php echo $row["id"];?>' class='readmore btn btn-primary' style="float:right">Read More </a>

					<?php endif;
					?>
  <!--start of liking sys-->
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
<!--end of liking-->
				</div><!-- /.blog-post -->
				<hr />
			<?php
			endwhile;
echo $pager;
			?>
			<?php
				}
			else{
				echo("<div class = 'alert alert-warning'>Sorry,no posts found ...</div>");
			}

			?>

        </div><!-- /.blog-main -->
<?php include_once "includes/footer.php" ?>
