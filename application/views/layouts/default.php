<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="">
    <meta name="author" content="">
	<meta charset="utf-8">
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    

    <!-- Le javascript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>js/jquery.cookie.js"></script>

	<!-- Le styles -->
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/docs.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/progress.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/pagedown.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>js/google-code-prettify/prettify.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

<body>
<?php include dirname(__FILE__).'/../header.php'; ?>
<div class="container">
<section>
		<div class="container">
		<?php if (isset($show_title) && $show_title == 1) { ?>
		<div class="page-header">
			<h1><?php echo $template['title']; ?></h1>
		</div>
		<?php } ?>
		<?php echo $template['body']; ?>
		</div>
</section>
</div>
<?php include dirname(__FILE__).'/../footer.php'; ?>
</body>
</html>