<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>New Post</title>
</head>

<body>

<div id="newpost">

	<p class="heading">New Post</p>
	<?php echo form_open('posts/submit', array('id' => 'newpost_form')); ?>
	
	<p>
		<?php echo form_error('title'); ?>
		<label for="title">Judul: </label>
		<?php echo form_input('title', set_value('title')); ?>
	</p>
	<p>
		<?php echo form_error('content'); ?>
		<label for="content">Isi: </label>
		<?php echo form_textarea('content', set_value('content')); ?>
	</p>
	<p>
		<?php echo form_error('tags'); ?>
		<label for="tags">Tags: (comma separated) </label>
		<?php echo form_input('tags', set_value('tags')); ?>
	</p>
	<p>
		<?php echo form_submit('submit','Submit post'); ?>
	</p>

	<?php echo form_close(); ?>
</div>

</body>
</html>