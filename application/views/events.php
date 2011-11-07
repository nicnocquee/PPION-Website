
<div id="posts" class="container">
	<?php foreach ($events as $event) { ?>
	<section>
	<div class="page-header">
				<h2><?php echo '<a href="'.base_url().'events/show/'.$event->getId().'">'.$event->getName(); ?></a></h2><em> by <a href="<?php echo base_url(); ?>members/<?php echo $event->getUser()->getId();?>" class="userName"><strong><em><?php echo $event->getUser()->getName(); ?></em></strong></a> on <?php echo $event->getCreatedAt()->format('l F j, Y, g:i a e'); ?></em>
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
<section id="pagination">
	<?php echo $pagination; ?>
</section>