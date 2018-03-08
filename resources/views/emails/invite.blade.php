<div>
	<h1><?php echo $loggedUserInfo->name ?> has invited you</h1>

	Please click below invite link:<br>
	<?php echo url('invite', $invite_code); ?>
</div>