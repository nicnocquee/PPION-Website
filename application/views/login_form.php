<!DOCTYPE html>
<html lang="en"  class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-1.1.0.css"
		type="text/css" media="all">
	<script src="<?php echo base_url(); ?>js/modernizr.js"></script>
</head>
<body>
<div class="container">

	<div class="page-header">
    <h1>Login</h1>
  	</div>

	<?php echo form_open('login/submit'); ?>
	
	<div class="<?php if(form_error('email')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="email">E-mail: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'email',
						'value' => set_value('email'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('email'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('password')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="password">Password: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'password',
						'value' => set_value('password'),
						'class' => 'xlarge'
					);
		echo form_password($data); ?>
		<span class="help-inline"><?php echo form_error('password'); ?></span>
		</div>
	</div>

	<div class="actions">
          <button type="submit" class="btn primary">Login</button>&nbsp; <a href="/signup" class="btn">Bikin akun</a>
    </div>

	<?php echo form_close(); ?>

</div>
</body>
</html>