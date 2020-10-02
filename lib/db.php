<?php

	class database{
		
		private $dbh = dbh;
		private $dbu = dbu;
		private $dbp = dbp;
		private $data = data;
		private $link;
		private $error;
		private $pageno;
		private $prev,$next;

		public function __construct(){
			$this->connect();
		}
		
		private function connect(){
			$this->link = new mysqli($this->dbh,$this->dbu,$this->dbp,$this->data);
			if(!$this->link){
				$this->error = "connection failed".$this->link->connect_error;
			}
		}
		
		public function select($query){
			$result = $this->link->query($query);
			if($result->num_rows > 0){
				return $result;
			}
			else{
				return false;
			}
		}
		public function insert($query){
			$result = $this->link->query($query);
			if($result){
				//header("location:index.php?insert= post inserted");
				return true;
			}
			else{
				//echo("post not inserted");
				return false;
			}
		}
		public function update($query){
			$result = $this->link->query($query);
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		public function deletepost($query){
			$result = $this->link->query($query);
			if($result){
				return true;
			}
			else{
				return false;
			}
		}
		public function paging($cat,$s){
			$query = "select * from posts";
			if($cat > 0){
				$query = $query." where cat_id = ".$cat;
				$pgnm = "category.php";
			}
			else{
				if($s!="" && $s!=null)
					$query = "select * from posts where title like '%".$s."%' or tags like '%".$s."%' or content like '%".$s."%' or author like '%".$s."%' order by id desc";
				$pgnm = "index.php";
			}
			$result = $this->link->query($query);
			$tot_rows = $result->num_rows;
			$tot_pages = ceil($tot_rows/10);
//set no. of pages 10
			$page_list = "";
			if($tot_pages>1){

				if($this->pageno>1){
					$this->prev =$this->pageno-1;
					if($cat > 0)
						$page_list .="<a href ='".$pgnm."?id=".$cat."&pgno=".$this->prev."'><span style='font-size:20px;'> previous </span></a>";
					elseif($s!="" && $s!=null)					
						$page_list .="<a href ='".$pgnm."?search=".$s."&pgno=".$this->prev."'><span style='font-size:20px;'> previous </span></a>";
					else
						$page_list .="<a href ='".$pgnm."?pgno=".$this->prev."'><span style='font-size:20px;'> previous </span></a>";
				}
				//previous button over
				$page_list .= "<ul class = 'pagination' style='margin:0px'>";

				for($i = $this->pageno-3;$i<$this->pageno;$i++)
					if($i>0)
						if($cat>0)
							$page_list .= "<li><a href = '".$pgnm."?id=".$cat."&pgno=".$i."'>".$i."</a></li>";
						elseif($s!="" && $s!=null)
							$page_list .= "<li><a href = '".$pgnm."?search=".$s."&pgno=".$i."'>".$i."</a></li>";
						else
							$page_list .= "<li><a href = '".$pgnm."?pgno=".$i."'>".$i."</a></li>";
				//pages less than current page over
				
				if($cat>0)				
					$page_list .= "<li class='active'><a href ='".$pgnm."?id=".$cat."&pgno=".$i."'>".$i."</a></li>";
				elseif($s!="" && $s!=null)
					$page_list .= "<li class='active'><a href ='".$pgnm."?search=".$s."&pgno=".$i."'>".$i."</a></li>";
				else
					$page_list .= "<li class='active'><a href ='".$pgnm."?pgno=".$i."'>".$i."</a></li>";
				//current page over
				for($i = $i+1;$i<=$tot_pages && $i<$this->pageno+3;$i++)
						if($cat>0)
							$page_list .= "<li><a href = '".$pgnm."?id=".$cat."&pgno=".$i."'>".$i."</a></li>";
						elseif($s!="" && $s!=null)
							$page_list .= "<li><a href = '".$pgnm."?search=".$s."&pgno=".$i."'>".$i."</a></li>";
						else
							$page_list .= "<li><a href = '".$pgnm."?pgno=".$i."'>".$i."</a></li>";						
				$page_list .= "</ul>";
	
				if($tot_pages>$this->pageno){
					$this->next =$this->pageno+1;
					if($cat>0)
						$page_list .="<a href ='".$pgnm."?id=".$cat."&pgno=".$this->next."'><span style='font-size:20px'> next </span></a>";
					elseif($s!="" && $s!=null)
						$page_list .="<a href ='".$pgnm."?search=".$s."&pgno=".$this->next."'><span style='font-size:20px'> next </span></a>";
					else
						$page_list .="<a href ='".$pgnm."?pgno=".$this->next."'><span style='font-size:20px'> next </span></a>";						
				}
			
			}
			return $page_list;			
		}

		public function setpage($p){
			$this->pageno = $p;
		}
		
	}
?>
