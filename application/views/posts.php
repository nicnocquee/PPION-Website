<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Articles</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

<body>

<div id="posts">

	<p class="heading">Articles</p>
	<?php foreach ($posts as $post) { ?>
	<div id="post">
		<h2><?php echo $post->getTitle(); ?></h2>
		<h4>By <?php echo $post->getUser()->getName(); ?> on <?php echo $post->getCreatedAt()->format('l F j, Y, g:i a e'); ?></h4>
		<div id='content'>
			<?php echo nl2br($post->getContent()); ?>
		</div>
		<div id="tags">
		Tags: <?php echo implode(', ', $post->getTagsNameArray()); ?>
		</div>
	</div>
	<?php } ?>
</div>

</body>
</html>