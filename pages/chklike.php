<?php include_once "project.php" ?>

<?php
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";

	$db = new database();
?>
<?php
if(isset($_GET["u"]) && isset($_GET["p"])){
    $uid = $_GET["u"];
    $pid = $_GET["p"];

    $query1 = "select * from likes where uid ='$uid' and pid='$pid'";
    $posts1 = $db->select($query1);
    if(!$posts1){
      $query = "INSERT INTO `likes` (`id`, `uid`, `pid`) VALUES (NULL, '$uid','$pid')";
      $ret = $db->insert($query);
    }
    header("location:".$loc."single.php?id=".$pid);
}
else {
  header("location:".$loc."logsign/login.php");
}
 ?>
