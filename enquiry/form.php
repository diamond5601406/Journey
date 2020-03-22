<div class="section" id="contact">
	<?php
	// ---------------------------------------------------------------------------------------------
	// INPUT MODE
	// ---------------------------------------------------------------------------------------------
	if ($status == STATUS_INPUT) {
	?>
		<form action="#contact_sec" method="post" accept-charset="utf-8">

			<input type="text" name="d_text" autocomplite="off" style="display:none;">
			
			<dl>
				<dt><?php echo $items['Name']['name']; ?></dt>
				<dd>
					<input type="text" name="Name" maxlength="50" value="<?php echo @$posts['Name']; ?>">
					<span class="notes"><?php echo $items['Name']['example']; ?></span>
					<?php if( isset( $error['Name'] ) ){ ?><span class="errorMsg"><?php echo $error['Name']; ?></span><?php } ?>
				</dd>
				
				<dt><?php echo $items['Email']['name']; ?></dt>
				<dd>
					<input type="email" name="Email" maxlength="50" value="<?php echo @$posts['Email']; ?>">
					<span class="notes"><?php echo $items['Email']['example']; ?></span>
					<?php if( isset( $error['Email'] ) ){ ?><span class="errorMsg"><?php echo $error['Email']; ?></span><?php } ?>
				</dd>
				
				<dt><?php echo $items['Contents']['name']; ?></dt>
				<dd>
					<textarea name="Contents"><?php echo @$posts['Contents']; ?></textarea><span class="notes"><?php echo $items['Contents']['example']; ?></span>
					<?php if( isset( $error['Contents'] ) ){ ?><span class="errorMsg"><?php echo $error['Contents']; ?></span><?php } ?>
				</dd>
			</dl>
			<p>
				<input type="submit" class="button" value="送信" />
			</p>
			<input type="hidden" name="status" value="<?php echo STATUS_CONFIRM; ?>">
		</form>
	<?php
	}
	// ---------------------------------------------------------------------------------------------
	// THANKS MODE
	// ---------------------------------------------------------------------------------------------
	else if( $status == STATUS_THANKS ) {
	?>
			<p>送信が完了しました。</p>
	<?php
	}
	?>
</div>

