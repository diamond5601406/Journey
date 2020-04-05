	<?php
	// ---------------------------------------------------------------------------------------------
	// INPUT MODE
	// ---------------------------------------------------------------------------------------------
	if ($status == STATUS_INPUT) {
	?>
		<form action="./form.php" method="post" accept-charset="utf-8">

			<input type="text" name="d_text" autocomplite="off" style="display:none;">

			<dl>
				<dd>
					<input class="contact" type="text" name="Name" maxlength="50" placeholder="Name" value="<?php echo @$posts['Name']; ?>">
					<?php if( isset( $error['Name'] ) ){ ?>
						<span class="errorMsg"><?php echo $error['Name']; ?></span>
					<?php } ?>
				</dd>

				<dd>
					<input class="contact" type="email" name="Email" maxlength="50" placeholder="Email" value="<?php echo @$posts['Email']; ?>">
					<?php if( isset( $error['Email'] ) ){ ?>
						<span class="errorMsg"><?php echo $error['Email']; ?></span>
					<?php } ?>
				</dd>

				<dd>
					<textarea class="contact" name="Message" placeholder="Message"><?php echo @$posts['Message']; ?></textarea>
					<?php if( isset( $error['Message'] ) ){ ?>
						<span class="errorMsg"><?php echo $error['Message']; ?></span>
					<?php } ?>
				</dd>
			</dl>
			<p>
				<input type="submit" class="btn btn-light" value="Submit" />
			</p>
			<input type="hidden" name="status" value="<?php echo STATUS_CONFIRM; ?>">
		</form>
	<?php
	} else if( $status == STATUS_THANKS ) {

	?>
			<p>Success</p>
	<?php
	}
	?>

