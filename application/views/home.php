<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"
		type="text/css" media="all">
</head>
<body>

<div>

	<?php if(models\Current_User::user()): ?>
		<h2>Hello <em><?php echo models\Current_User::user()->getName(); ?></em>.</h2>
		<h2><?php echo anchor('logout','Logout'); ?></h2>
	<?php else: ?>
		<h2>New Users: <?php echo anchor('signup','Create an Account'); ?>.</h2>
		<h2>Members: <?php echo anchor('login','Login'); ?>.</h2>
	<?php endif; ?>

</div>

</body>
</html>