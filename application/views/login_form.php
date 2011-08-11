<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"
		type="text/css" media="all">
</head>
<body>

<div id="signup_form">

	<p class="heading">Login</p>

	<?php echo form_open('login/submit'); ?>

	<?php echo validation_errors('<p class="error">','</p>'); ?>

	<p>
		<label for="email">E-mail: </label>
		<?php echo form_input('email',set_value('email')); ?>
	</p>
	<p>
		<label for="password">Password: </label>
		<?php echo form_password('password'); ?>
	</p>
	<p>
		<?php echo form_submit('submit','Login'); ?>
	</p>

	<?php echo form_close(); ?>
	<p>
		<?php echo anchor('signup','Bikin akun'); ?>
	</p>

</div>

</body>
</html>