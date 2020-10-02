<?php

	$db = new database();
	$query = "select * from category";
	$cat = $db->select($query);
?>

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<div class="container-fluid">
			<form action ="index.php" method="get">
				<div class="sbar input-group pull-right">
					<span class="sicon input-group-addon bg-blu" style="color:#ff9900"><i class='fa fa-search'></i></span>
					<input type="text" class="sinput form-control" id="search" name="search" placeholder="search..">
				</div>
			</form>
			</div>
			<br />
			<center><h1><big>
				<?php echo("<a href='".$loc."posts/add.php'><i class ='fa fa-plus-circle' style='color:#ff9900;'></i></a>");?>
			</big></h1></center>
          <div class="sidebar-module sidebar-module-inset txt-yellow">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div>
          <div class="sidebar-module">
            <h4>Categories</h4>
            <ol class="list-unstyled">
			<?php while($row = $cat->fetch_array()):?>
              <li><a href="category.php?id=<?php echo($row['id']); ?>"><?php echo($row["title"]); ?></a></li>
            <?php endwhile;?>
            </ol>
          </div>
          <div class="sidebar-module">
            <h4>Elsewhere</h4>
            <ol class="list-unstyled">
              <li><a href="#"><i class="fa fa-github"></i> GitHub</a></li>
              <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
              <li><a href="#"><i class = "fa fa-facebook"></i> Facebook</a></li>
            </ol>
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer" style="background:black;color:#fff">
      <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by <a target="_blank" href="http://nikita-portfolio.ml">me</a></p>
      <p>
        <a href="#"><i class="fa fa-arrow-up"></i></a>
      </p>
    </footer>


    </body>
</html>
