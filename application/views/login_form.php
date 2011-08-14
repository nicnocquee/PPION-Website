<!DOCTYPE html>
<html lang="en"  class="no-js">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"
		type="text/css" media="all">
	<script src="<?php echo base_url(); ?>js/modernizr.js"></script>
</head>
<body>

<div id="signup_form">

	<p class="heading">Login</p>

	<?php echo form_open('login/submit'); ?>

	<?php echo validation_errors('<p class="error">','</p>'); ?>

	<p>
		<label for="email">E-mail: </label>
		<input name="email" placeholder="required" id="email" type="text" value="<?php echo set_value('email'); ?>" required> <!--<?php echo form_input('email',set_value('email')); ?>-->
	</p>
	<p>
		<label for="password">Password: </label>
		<?php echo form_password('password'); ?>
	</p>
<!--	<p>
		Date: <input type=date />

<script>
$(function() {
    // Check if the browser supports the date input type
    if (!Modernizr.inputtypes.date){
        // Add the jQuery UI DatePicker to all
        // input tags that have their type attributes
        // set to 'date'
        $('input[type=date]').datepicker({
            // specify the same format as the spec
            dateFormat: 'yy-mm-dd'
        });
    }
});
</script>
	</p> -->
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