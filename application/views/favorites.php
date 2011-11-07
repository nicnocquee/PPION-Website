<div id="favorites">

	<?php
	if (count($favorites) > 0) { 
	foreach ($favorites as $favorite) { ?>
	<section id="post">
		<div class="row">
		<a href="<?php echo base_url(); ?>posts/show/<?php echo $favorite->getPost()->getId();?>"><?php echo $favorite->getPost()->getTitle(); ?></a>
		</div>
	</section>
	<?php }} else {
		echo 'You have no favorite posts yet.';
	} ?>
</div>
<section id="pagination">
	<?php echo $pagination; ?>
</section>
