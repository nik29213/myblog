<?php include_once "project.php" ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$em="";
$e=0;
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";
	$db = new database();

if(isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if(isset($_GET["em"]))
			$em = $_GET["em"];
		$pid = $_GET["id"];
		$query = "select * from posts where id ='$pid'";
		$posts = $db->select($query);
		$row = $posts->fetch_array();
		$cid = $row["cat_id"];
		$query2 = "select * from category where id ='$cid'";
		$posts2 = $db->select($query2);
		$row3 = $posts2->fetch_array();
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pid = $_POST["pid"];
		if (empty($_POST["title"])) {
			$em = "Kindly give the title";
		}	 
		elseif (empty($_POST["posting"])) {
			$em = "empty posts can't be submitted";
		} 
		elseif (empty($_POST["tags"])) {
			$em = "tags are compulsory";
		} 
		elseif (!isset($_POST["cats"])) {
			$em = "choose a topic from dropdown";
		} 
		else{	
				
				$title = $_POST["title"];
				$tags = $_POST["tags"];
				$content = $_POST["posting"];
				$cats = $_POST["cats"];
				$query = "update `posts` set title='$title',content='$content',tags='$tags',cat_id='$cats',date=CURRENT_TIMESTAMP where id='$pid'";
				$ret = $db->update($query);
				if($ret == true){
				$em = "<div class='alert alert-success'><strong>Successfully updated</strong></div>";
				header("location:edit.php?id=".$pid."&em=".$em);
				}
				else
					$em = "<div class='alert alert-danger'><strong>couldn't update</strong></div>";
		}
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
			<center><h1 class="" style="color:#ff9900"><big>EDIT POST</big> </h1></center>
				<div class ="row">
					<div class ="col-sm-3"></div>
					<div class ="col-sm-6"><br /><br />
					  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form2" method="post">
					  <p class="txt-warning txt-red"><?php echo $em; ?></p><br />
						<input type="text" class="addinput form-control" placeholder="Enter title" name="title" value="<?php echo $row["title"];?>"><br>
												
						<textarea class="form-control addinput" placeholder="enter post" rows="15" style="resize: none;" name ="posting"><?php echo $row["content"];?></textarea><br />
						<input type="text" class="addinput form-control" placeholder="Enter tags(separated by commas )" name="tags" value="<?php echo $row["tags"];?>"><br>
						<select name ="cats" class ="form-control">
							<option value="" disabled>select a topic</option>
							<?php
								$query1 = "select * from category";
								$cat = $db->select($query1);
							?>
							<?php while($row1 = $cat->fetch_array()):?>
									  <option value="<?php echo($row1['id']); ?>" <?php if($row1['id']==$row3['id'])echo('selected="true"');?>><?php echo($row1["title"]); ?></option>
							<?php endwhile;?>
						</select><br/>
						<input type="text" value = "<?php echo($pid);?>" name="pid" hidden>

						<input type="submit" class="btn btn-warning btn-lg bg-yellow" value="POST"><br><br />
						<p class="txt-warning txt-red"><?php echo $em; ?></p>
					  </form>
	
					</div>
					<div class ="col-sm-3"></div>

				</div>
			</div>
			<br /><br /><br />
			<center><a href="auth.php" class="btn btn-primary bg-blu btn-lg" value="aid">MANAGE YOUR OLDER POSTS</a></center>
			<br><br /><br />
		</div>
	</body>
</html>