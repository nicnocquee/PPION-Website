<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Events</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

<body>

<div id="posts">

	<p class="heading">Events</p>
	<?php foreach ($events as $event) { ?>
	<div id="event">
		<h2><?php echo $event->getName(); ?></h2>
		<h4>By <?php echo $event->getUser()->getName(); ?> on <?php echo $event->getCreatedAt()->format('l F j, Y, g:i a e'); ?></h4>
		<div id='description'>
			<?php echo nl2br($event->getDescription()); ?>
		</div>
		<div id='place'>
			<?php echo 'Tempat: '.$event->getPlace(); ?>
		</div>
		<div id='time'>
			<?php setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID'); ?>
			<?php echo 'Waktu: '.strftime("%A %e %B %Y %r", $event->getTimestart()->getTimestamp()).' sampai '.strftime("%A %e %B %Y %r", $event->getTimeend()->getTimestamp()); ?>
		</div>
		<div id='cost'>
			<?php echo 'Biaya: '.$event->getCost(); ?>
		</div>
		<div id='members'>
			<?php echo 'Panitia :'.implode(',', $event->getMembersArray()); ?>
		</div>
		<div id="tags">
		Tags: <?php echo implode(', ', $event->getTagsNameArray()); ?>
		</div>
	</div>
	<?php } ?>
</div>

</body>
</html>