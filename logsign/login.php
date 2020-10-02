<?php include_once "project.php" ?>

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$emsg="";
$e=0;
if(!isset($_SESSION["uid"])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["unm"])) {
			$emsg = "Name is required";$e++;
		}	 
		elseif (empty($_POST["pass"])) {
			$emsg = "password is required";$e++;
		} 
		else{
			
			$fnm = $_POST["unm"];
			$pwd = md5($_POST["pass"]);
				include_once "../lib/config.php";
				include_once "../lib/db.php";
				include_once "../lib/functions.php";
				$db = new database();
				
			$query = "select * from users where email ='$fnm' or name = '$fnm' and password = '$pwd' limit 1";
			$posts = $db->select($query);
			if($posts == true){
				$row = $posts->fetch_array();		
				$_SESSION["uid"]=$row["user_id"];
				header("location:../index.php");
			}
			else{
					$emsg = "Check the details entered";
			}
		}
	}
}
else{
	header("location:../index.php");
}
	
?>
<?php include_once "../includes/nav.php"?> 
		<main>
			<div id="container">
			  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form1" method="post">
				<h1><i class ="fa fa-user" style="color:#fff"></i></h1>
				<br>
				<input type="text" class="input1" placeholder="username or email id" name="unm"><br>
				<input type="password" class="input1" placeholder="password" name="pass"><br>
				<span class="txt-warning txt-red"><?php echo $emsg?></span>
				<input type="submit" class="input1" value="SIGN IN"><br>
				<span class="txt-primary"><a href="signup.php">Not yet registered?register now</a></span>
			  </form>
			</div>
		</main>
		
	</body>
</html>