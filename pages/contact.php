<?php include_once "project.php" ?>

<?php
	include_once "../lib/config.php";
	include_once "../lib/db.php";
	include_once "../lib/functions.php";
?>
<?php include_once "../includes/nav.php"?>
<div class="container">
  <div class="blog-header">
    <h1 class="blog-title">Cont@ct us <i class="fa fa-envelope text-primary"></i></h1>
  </div>
  <br />

  <div class="row">
    <div class="col-sm-8 blog-main jumbotron">
      <form class="form-area contact-form text-right" id="myForm" action="https://formspree.io/nikki.nikitaagarwal01@gmail.com" method="POST">
								<div class="row">
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
<br />
										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
<br />
										<input name="subject" placeholder="Enter subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter subject'" class="common-input mb-20 form-control" required="" type="text">
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" rows="5" name="message" placeholder="Enter Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Messege'" required=""></textarea>
									</div>
									<div class="col-lg-12">
										<div class="alert-msg" style="text-align: left;"></div>
										<button class="btn btn-primary btn-lg" style="float: right;" type="submit"><i class="fa fa-send"></i></button>
									</div>
								</div>
							</form>
    </div><!-- /.blog-main -->

<?php include_once "../includes/footer.php" ?>
<script>
  </script>
