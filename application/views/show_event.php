<div class="page-header">
				<h2><?php echo $event->getName(); ?></h2><em> by <a href="/members/<?php echo $event->getUser()->getId();?>" class="userName"><strong><em><?php echo $event->getUser()->getName(); ?></em></strong></a> on <?php echo $event->getCreatedAt()->format('l F j, Y, g:i a e'); ?></em>
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
						<?php echo '<strong>Biaya</strong>: '.$event->getCost().' yen'; ?>
					</div>
					<?php echo '<strong>Deadline pendaftaran</strong>: '.$event->getDeadline()->format('l F j, Y, g:i a'); ?>
					<div id='members'>
						<?php echo '<strong>Panitia</strong>: '.implode(',', $event->getMembersArray()); ?>
					</div>
					<div id="tags">
					<strong>Tags</strong>: <?php echo implode(', ', $event->getTagsNameArray()); ?>
					</div>
					<div style="padding: 5px 5px 0px 0px;"><a href="#" class="btn success">Pasti datang</a></div>
					<div style="padding: 5px 5px 0px 0px;"><a href="#" class="btn">Mungkin datang</a></div>
					<div style="padding: 5px 5px 0px 0px;"><a href="#" class="btn danger">Tidak akan datang</a></div>
				</div>
			</div>
			
<section>
	<h2>Comments</h2>
	<div class="row">
	<div class="span10 columns">
	<?php
		if (isset($comments) && count($comments)>0) {
			foreach($comments as $comment){
			?>
			<div class="row commentBox">
				<div class="span2 columns">
					<div class="media-grid">
						<a href="#">
						  <img class="thumbnail" src="http://placehold.it/90x90" alt="">
						</a>
					</div>
				</div>
				<div class="span7 columns">
				<?php
					echo '<a href="/members/'.$comment->getUser()->getId().'" class="userName"><strong>'.$comment->getUser()->getName().'</strong></a>&nbsp'.$comment->getContent();
					echo '<p class="commentDate">'.$comment->getCreatedAt()->format('l F j, Y g:i a').'</p>';
				?>
				</div>
			</div>
			<?php } ?>
			
		<?php } else {
			?>
			<div class="alert-message warning">
			  Belum ada komen.
			</div>
			<?php
		}
	?>
	<div class="row commentBox commentInputBox">
			<div class="span8 columns">
				<form action="posts/comment">
				<?php 
					$data = array(
								'name' => 'comment',
								'value' => set_value('comment'),
								'class' => 'large'
							);?>
				<textarea class="span8 commentInput" name="comment" type="textarea" placeholder="Tulis komen disini" rows="1"></textarea>
			</div>
			<div class="span1 columns commentButton">
				<button type="submit" class="btn primary">Submit</button>
			</div>
				<?php echo form_close(); ?>
			</div>
	</div>
	</div>
	</section>