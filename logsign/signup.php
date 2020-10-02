<?php include_once "project.php" ?>

<?php
session_start();
$emsg=$enm=$eemail=$epwd=$ecnfpwd=$ecntry=$edesc="";
$e=0;
if(!isset($_SESSION["uid"])){
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["unm"])) {
			$enm = "Name is required";$e++;
		}	 
		if (empty($_POST["pass"])) {
			$epwd = "password is required is required";$e++;
		} 
		if (empty($_POST["cnf_pass"])) {
			$ecnfpwd = "confirm your password is required";$e++;
		} 
		if (!isset($_POST["country"])) {
			$ecntry = "country is required";$e++;
		} 
		if (empty($_POST["email"])) {
			$eemail = "email is required";$e++;
		}
		if($e == 0){
			$pwd = $_POST["pass"];
			$cpwd = $_POST["cnf_pass"];
			$email = $_POST["email"];
			if(strlen($pwd)<8){
				$epwd = "password should be greater than 8 characters";$e++;
			}
			if($pwd !=$cpwd){
				$ecnfpwd = "confirm password should be same as password";$e++;
			}
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)){ 
			$eemail = "Invalid email format";$e++;
			}
		}
		if($e == 0){
			$email =$_POST["email"];
			$fnm = $_POST["unm"];		
			include_once "../lib/config.php";
			include_once "../lib/db.php";
			include_once "../lib/functions.php";
			
			$db = new database();
			$query = "select * from posts where email ='$email' or name = '$fnm' limit 1";
			$posts = $db->select($query);
			if($posts == true)
				$eemail = "email id or username is already registered";
			else{
				$fnm = $_POST["unm"];
				$pwd = md5($_POST["pass"]);
				$cntry = $_POST["country"];
				$desc = $_POST["describe"];
				$query = "INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `country`, `description`, `date`) VALUES (NULL, '$fnm', '$email', '$pwd', '$cntry', '$desc', CURRENT_TIMESTAMP)";
				$ret = $db->insert($query);
				if($ret ==true){
					$query = "select * from users where email ='$email' or name = '$fnm' limit 1";
					$posts = $db->select($query);
					$row = $posts->fetch_array();
					$_SESSION["uid"]=$row["user_id"];
					$emsg = "<div class='alert alert-success'><strong>Successfully signed up</strong></div>";
				}
				else
					$emsg = "<div class='alert alert-success'><strong>Couldn't sign up</strong></div>";
			}
		
		}
		
	}
}
else
	header("location:../index.php");
?>
<?php include_once "../includes/nav.php"?> 
		<div class ="container-fluid">
			<div class ="row">
				<!--<div class ="col-sm-1"></div>-->
				<div class ="col-sm-7">
					<br />
					<img src="../images/signup.jpg" class="img-responsive" style="margin:0px;"/>
				</div>
				<div class ="col-sm-5">
					<div class="container-fluid"  style="margin:0px;">
						<br />
						<div class="panel panel-primary ">
							<div class="panel-heading ">
								<h4><big>S I G N&nbsp U P</big></h4>
							</div>
							<div class="panel-body">
								<center>
									<big><big><i class ="fa fa-user"></i></big></big>
								</center>
								<br>
								<!--<form method="post" action="register.php">-->
								<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

								<div class="input-group">
									<input type="text" id="unm" placeholder="Enter username" class="form-control" name="unm">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								</div>
								<p class="txt-red"><?php echo($enm);?></p>
								<br>
								<div class="input-group">
									<input type="email" id="email" placeholder="Enter your email address" class="form-control" name="email">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope" ></i></span>
								</div>
								<p id="" class="txt-red"><?php echo($eemail);?></p>
								<br>
								<div class="input-group">
									<input type="password" id="pass" placeholder="Enter your password" class="form-control" name="pass">
									<span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
								</div>
								<p id="error_pwd" class="txt-red"><?php echo($epwd);?></p>
								<br>	
								<div class="input-group">
									<input type="password" id="cnf_pass" placeholder="confirm password" class="form-control" name="cnf_pass">
									<span class="input-group-addon "><i class="glyphicon glyphicon-lock"></i></span>
								</div>
								<p id="error_cnf" class="txt-red"><?php echo($ecnfpwd);?></p>
								<br>
								<div class="input-group">
									<select class="form-control" id="country" name="country">
										<?php include "country.php";?>
									</select>
									<span class="input-group-addon "><i class="glyphicon glyphicon-flag"></i></span>
								</div>
								<p id="error_cntry" class="txt-red"><?php echo($ecntry);?></p>
								<br>
								<div class="input-group">
									<input type="text" id="describe" placeholder="Enter your one line intro" class="form-control" name="describe">
									<span class="input-group-addon "><i class="fa fa-pencil"></i></span>
								</div>
								<p id="error_desc" class="txt-red"><?php echo($edesc);?></p>
								<br>
								<center>
									<p id="error_msg" class="txt-red"><?php echo($emsg);?></p>
									<button type='submit' id='btn_sign' class='btn btn-primary' style='color:white;'> <strong>S I G N U P</strong> </button>
									<br>
									<a href = "login.php">already registered?login</a>
								</center>
							</form>
							</div>
						</div>
					</div>
				</div>
				<!--<div class ="col-sm-1"></div>-->
			</div><!--end of row-->
		</div>
	</body>
</html>
