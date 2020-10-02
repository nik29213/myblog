<?php include_once "project.php" ?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$delmsg="";
$e=0;
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";
	$db = new database();

if(isset($_SESSION["uid"])){
	$uid = $_SESSION["uid"];
	if ($_SERVER["REQUEST_METHOD"] == "GET") $pid = $_GET["id"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pid = $_POST["pid"];
		$query = "delete from posts where id ='$pid'";
		$posts = $db->deletepost($query);
		if($posts==true)
			$delmsg = "<div class='alert alert-success'><strong>Successfully deleted</strong></div>";
		else
			$delmsg = "<div class='alert alert-danger'><strong>couldn't delete</strong></div>";
			
	}
}
else{
	header("location:../logsign/login.php");
}
?>
<?php include_once "../includes/nav.php"?> 

			<div class =" container-fluid bg-blu addbg">
			<center><br /><h1 class="" style="color:#ff9900"><big>DELETE POST</big> </h1><br /></center>
			</div>
		<div class="jumbotron">	
		<div class ="row">
		<div class="col-sm-3"></div>
		<div class ="col-sm-6">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form2" method="post">
				<h1>Are you sure to delete the selected post ??? <i class="fa fa-trash" style="color:red"></i></h1><br />
							<center>
							<input type="text" value = "<?php echo($pid);?>" name="pid" hidden>
							<input type="submit" class="btn btn-primary btn-lg" value="Yes">
							<a href="auth.php" class="btn btn-primary btn-lg">No</a>
							</center><br><br />
							
			</form>
			<p><?php echo($delmsg); ?></p>
			<center>
			<a href="auth.php" class="btn btn-primary btn-lg">BACK</a>
			</center>
		</div>
		<div class="col-sm-3"></div>
		</div>
		</div>	
	</body>
</html>	