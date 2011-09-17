<div id="posts">

	<?php foreach ($posts as $post) { ?>
	<section id="post">
		<div class="page-header">
		<h2><?php echo $post->getTitle(); ?>&nbsp;&nbsp;<small>by <?php echo $post->getUser()->getName(); ?> on <?php echo $post->getCreatedAt()->format('l F j, Y, g:i a'); ?></small></h2>
		</div>
		<div id='content'>
			<?php echo nl2br($post->getContent()); ?>
		</div>
		<div class="post-footer">
		Tags: <?php echo implode(', ', $post->getTagsNameArray()); ?>
		</div>
	</section>
	<?php } ?>
</div>
