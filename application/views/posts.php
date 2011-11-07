<div id="posts">

	<?php foreach ($posts as $post) { ?>
	<section id="post">
		<div class="page-header">
		<h2><a href="<?php echo base_url(); ?>posts/show/<?php echo $post->getId();?>"><?php echo $post->getTitle(); ?></a></h2>
		<div class="postTitleDate"><small class="postTitleDate">by <a href="/members/<?php echo $post->getUser()->getId();?>" class="userName"><strong><em><?php echo $post->getUser()->getName(); ?></em></strong></a> on <?php echo $post->getCreatedAt()->format('l F j, Y, g:i a'); ?></small></div>
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
<section id="pagination">
	<?php echo $pagination; ?>
</section>
