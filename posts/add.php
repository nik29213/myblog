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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
				$query = "INSERT INTO `posts` (`id`, `cat_id`, `title`, `content`, `tags`, `date`, `author`) VALUES (NULL, '$cats', '$title', '$content', '$tags',CURRENT_TIMESTAMP,'$uid')";
				$ret = $db->insert($query);
				if($ret == true)
					$em = "<div class='alert alert-success'><strong>Successfully posted</strong></div>";
				else
					$em = "<div class='alert alert-danger'><strong>couldn't post</strong></div>";
		}
	}
}
else{
	header("location:../logsign/login.php");
}
?>
<?php include_once "../includes/nav.php"?> 
<!--<div class="container-fluid">
	<div class = "row">
		<div class ="col-sm-12">
			<div class="cont">
			  <img src="../images/p22.jpeg" alt="Snow" style="width:100%;" class="imgadd">
			  <div class="centered">
					<input type="text" class="addinput" placeholder="username or email id" name="unm"><br>
			  </div>
			</div>
		</div>
	</div>
</div>-->
		<div class="bg-yellow">

			<div class =" container-fluid bg-blu addbg">
			<br /><br /><br />
			<center><h1 class="" style="color:#ff9900"><big>ADD NEW POST</big> </h1></center>
				<div class ="row">
					<div class ="col-sm-3"></div>
					<div class ="col-sm-6"><br /><br />
					  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form2" method="post">
						<input type="text" class="addinput form-control" placeholder="Enter title" name="title"><br>
						<textarea class="form-control addinput" placeholder="enter post" rows="8" style="resize: none;" name ="posting"></textarea><br />
						<input type="text" class="addinput form-control" placeholder="Enter tags(separated by commas )" name="tags"><br>
						<select name ="cats" class ="form-control">
							<option value="" selected="true" disabled>select a topic</option>
							<?php
								$query1 = "select * from category";
								$cat = $db->select($query1);
							?>
							<?php while($row1 = $cat->fetch_array()):?>
									  <option value="<?php echo($row1['id']); ?>"><?php echo($row1["title"]); ?></option>
							<?php endwhile;?>
						</select><br/>
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