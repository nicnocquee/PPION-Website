<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Logout</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"
		type="text/css" media="all">
	<meta http-equiv="refresh" content="3;url=<?php echo base_url(); ?>">
</head>
<body>

<div>

	<p>
		You are now logged out.
	</p>
	<p>
		Redirecting you <?php echo anchor('/','home'); ?>.
	</p>

</div>

</body>
</html>