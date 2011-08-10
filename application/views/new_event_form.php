<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>New Event</title>
</head>

<body>

<div id="newpost">

	<p class="heading">New Event</p>
	<?php echo form_open('events/submit', array('id' => 'newevent_form')); ?>
	
	<p>
		<?php echo form_error('name'); ?>
		<label for="name">Nama: </label>
		<?php echo form_input('name', set_value('name')); ?>
	</p>
	<p>
		<?php echo form_error('description'); ?>
		<label for="description">Deskripsi: </label>
		<?php echo form_textarea('description', set_value('description')); ?>
	</p>
	<p>
		<?php echo form_error('place'); ?>
		<label for="place">Tempat: </label>
		<?php echo form_input('place', set_value('place')); ?>
	</p>
	<p>
		<?php echo form_error('deadline'); ?>
		<label for="deadline">Tenggat waktu pendaftaran: (YYYY/MM/DD)</label>
		<?php echo form_input('deadline', set_value('deadline')); ?>
	</p>
	<p>
		<?php echo form_error('time-start'); ?>
		<label for="time-start">Waktu mulai: (YYYY/MM/DD HH:MM)</label>
		<?php echo form_input('time-start', set_value('time-start')); ?>
	</p>
	<p>
		<?php echo form_error('time-end'); ?>
		<label for="time-end">Waktu selesai: (YYYY/MM/DD HH:MM)</label>
		<?php echo form_input('time-end', set_value('time-end')); ?>
	</p>
	<p>
		<?php echo form_error('cost'); ?>
		<label for="cost">Biaya: </label>
		<?php echo form_input('cost', set_value('cost')); ?>
	</p>
	<p>
		<?php echo form_error('limitation'); ?>
		<label for="limitation">Batasan: </label>
		<?php echo form_input('limitation', set_value('limitation')); ?>
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