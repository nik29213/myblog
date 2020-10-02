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
	$query = "select * from posts where author ='$uid'";
		$posts = $db->select($query);
}
else{
	header("location:../logsign/login.php");
}
?>
<?php include_once "../includes/nav.php"?> 

			<div class =" container-fluid bg-blu addbg">
			<center><br /><h1 class="" style="color:#ff9900"><big>ADD NEW POST</big> </h1><br /></center>
			</div>
			<div class="container-fluid">
				<div class ="row">
					<div class ="col-sm-1"></div>
					<div class ="col-sm-10"><br /><br />
					<?php
					if($posts == true){
						echo('<div class="table-responsive">
							<table class ="table table-striped table-bordered table-hover">
								<tr class="" style="background:#0D0225;color:#ff9900"><th>title</th><th>category</th><th>contents</th><th>tag</th><th>date</th><th>Action</th></tr>
						');
					while($row = $posts->fetch_array()):
					$cid = $row["cat_id"];
					$pid = $row["id"];
					$query1 = "select * from category where id ='$cid'";
					$posts1 = $db->select($query1);
					$row1 = $posts1->fetch_array();
					?>
						
						<tr>
								<td><?php echo($row["title"]); ?></td><td><?php echo($row1["title"]); ?></td><td><?php echo(substr($row["content"],0,30)); ?>...</td><td><?php echo(substr($row["tags"],0,20)); ?></td><td><?php echo(formatDate($row["date"])); ?></td>
								<td>
									<a href ="show.php?id=<?php echo $pid;?>"><i class="fa fa-eye"></i> </a>&nbsp;
									<a href ="edit.php?id=<?php echo $pid;?>" style="color:green"><b> <i class="fa fa-edit"></i></b> </a>&nbsp;
									<a href ="del.php?id=<?php echo $pid;?>" style="color:red"> <i class="fa fa-trash"></i> </a>
								</td>
						</tr>
					<?php
					endwhile;
					?>	
					<?php
						echo("</table>
						</div>");
						}
					else{
						echo("<div class = 'alert alert-warning'>No posts found</div>");
					}	
					?>
					
					</div>
					<div class ="col-sm-1"></div>

				</div><!--end of row-->
			</div>
	</body>
</html>