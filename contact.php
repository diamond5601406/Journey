<?php require_once("./template/header.php"); ?>

<div class="container-fluid">
  <div class="row no-gutters">

      <?php require("./template/navigation.php"); ?>

      <div class="col-md-10 smp-home-main">
      	<div class="main">
      		<div class="row no-gutters">
      			<div class="col-12 contact-area-container">
      				<div class="contact-area">
      					<h1>GET IN TOUCH</h1>
		          	<?php
									//Enquiry Definition:
									define("MODE_LIVE",      0);
									define("MODE_DEBUG",     1);

									define("STATUS_INPUT",   0);
									define("STATUS_CONFIRM", 1);
									define("STATUS_THANKS",  2);

									Settings:
									$mode = MODE_DEBUG;
									$status = STATUS_INPUT;

									require_once ("./enquiry/util.php");
									require_once ("./enquiry/form.php");
								?>
							</div>
      			</div>
      		</div>
				</div>
      </div>
  </div>
</div>

