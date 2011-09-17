<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="description" content="">
    <meta name="author" content="">

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <link href="<?php echo base_url(); ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/docs.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>js/google-code-prettify/prettify.css" rel="stylesheet">

    <!-- Le javascript -->
    <script src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
    <script src="http://autobahn.tablesorter.com/jquery.tablesorter.min.js"></script>
    <script src="<?php echo base_url(); ?>js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo base_url(); ?>js/application.js"></script>
    <script src="<?php echo base_url(); ?>js/bootstrap-dropdown.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  </head>

<body onload="prettyPrint(); ">
<?php include 'header.php'; ?>

<section id="body">
<div id="posts" class="container">
	<?php foreach ($events as $event) { ?>
	<section id="event">
	<div class="page-header">
				<h2><?php echo $event->getName(); ?></h2><em> by <?php echo $event->getUser()->getName(); ?> on <?php echo $event->getCreatedAt()->format('l F j, Y, g:i a e'); ?></em>
				</div>
			<div id='description' class="row">
				<div class="span10 columns">
					<?php echo nl2br($event->getDescription()); ?>
				</div>
				<div class="span6 columns">
					<div id='place'>
						<?php echo '<strong>Tempat</strong>: '.$event->getPlace(); ?>
					</div>
					<div id='time'>
						<?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID'); ?>
						<?php echo '<strong>Waktu</strong>: '.strftime("%A %e %B %Y %r", $event->getTimestart()->getTimestamp()).' sampai '.strftime("%A %e %B %Y %r", $event->getTimeend()->getTimestamp()); ?>
					</div>
					<div id='cost'>
						<?php echo '<strong>Biaya</strong>: '.$event->getCost(); ?>
					</div>
					<div id='members'>
						<?php echo '<strong>Panitia</strong>: '.implode(',', $event->getMembersArray()); ?>
					</div>
					<div id="tags">
					<strong>Tags</strong>: <?php echo implode(', ', $event->getTagsNameArray()); ?>
					</div>
					<div id="by">
					</div>
				</div>
			</div>
	</section>
	
	

	
	<?php } ?>
</div>
</section>

</body>
</html>