<?php include_once "project.php" ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";
	$db = new database();

if(isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		$pid = $_GET["id"];
		$query = "select * from posts where id ='$pid'";
		$posts = $db->select($query);
		$row = $posts->fetch_array();
		$cid = $row["cat_id"];
		$query1 = "select * from category where id ='$cid'";
		$posts1 = $db->select($query1);
		$row2 = $posts1->fetch_array();
					
	}
}
else{
	header("location:../logsign/login.php");
}
	
?>
<?php include_once "../includes/nav.php"?> 
			<div class="bg-yellow">

			<div class =" container-fluid bg-blu addbg">
			<br /><br /><br />
			<center><h1 class="" style="color:#ff9900"><big><?php echo($row["title"]); ?></big> </h1></center>
				<div class ="row">
					<div class ="col-sm-3"></div>
					<div class ="col-sm-6" style="color:#fff;font-size:18px;"><br /><br />
						Date : <?php echo(formatDate($row["date"]));?><br />
						category : <?php echo($row2["title"]);?><br />
						Tags :<?php echo($row["tags"]); ?><br /><hr />
						<?php echo($row["content"]);?>
						<br/><br />
					</div>
					<div class ="col-sm-3"></div>

				</div>
			</div>
			<br /><br /><br />
			<center>
				<a href ="del.php?id=<?php echo $pid;?>" class="btn btn-primary bg-blu btn-lg"><b> <i class="fa fa-trash"></i></b> Delete</a>
				<a href ="edit.php?id=<?php echo $pid;?>" class="btn btn-primary bg-blu btn-lg"><b> <i class="fa fa-edit"></i></b> Edit</a>
			</center>
			<br><br /><br />
		</div>
	</body>
</html>