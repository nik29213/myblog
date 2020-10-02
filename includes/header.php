<?php
	include_once "lib/config.php";
	include_once "lib/db.php";
	include_once "lib/functions.php";
	
	$db = new database();
	$query = "select * from posts order by id desc";
	if(isset($_GET["search"])){
		$s= $_GET["search"];
		$query = "select * from posts where title like '%".$s."%' or tags like '%".$s."%' or content like '%".$s."%' or author like '%".$s."%' order by id desc";
	}
	if(isset($_GET["pgno"])){
		$cur_pg=$_GET["pgno"];
	}
	else{
		$cur_pg=1;
	}
	$db->setpage($cur_pg);
		if(isset($_GET["search"]))
			$pager = $db->paging(0,$s);
		else
			$pager = $db->paging(0,"");
	$query .=" limit ".(($cur_pg-1)*10).",10";
	$posts = $posts = $db->select($query);	
?>
