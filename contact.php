<?php require_once("./template/header.php"); ?>

<div class="container-fluid">
  <div class="row no-gutters">

      <?php require("./template/navigation.php"); ?>

      <div class="col-md-10 smp-home-main">
      	<div class="main">
      		<div class="row no-gutters">
      			<div class="col-12 contact-area-wrapper">
      				<div class="contact-area">
      					<h1>GET IN TOUCH</h1>
		          	<?php
									//Enquiry Definition:
									$MODE_LIVE      = 0;
									$MODE_DEBUG     = 1;

									$STATUS_INPUT   = 0;
								  $STATUS_CONFIRM = 1;
									$STATUS_THANKS  = 2;

									//Settings:
									$mode = MODE_LIVE;
									$status = STATUS_INPUT;

								?>

								<?php	require_once "./enquiry/util.php"; ?>
								<?php	require_once "./enquiry/form.php"; ?>
							</div>
      			</div>
      		</div>
				</div>
      </div>
  </div>
</div>

