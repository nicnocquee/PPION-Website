<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Signup Form</title>
</head>
<body>

<div id="signup_form">

	<p class="heading">New User Signup</p>
	<?php echo form_open('signup/submit'); ?>
	
	<p>
		<?php echo form_error('email'); ?>
		<label for="email">E-mail: </label>
		<?php echo form_input('email', set_value('email')); ?>
	</p>
	<p>
		<?php echo form_error('password'); ?>
		<label for="password">Password: </label>
		<?php echo form_password('password', set_value('password')); ?>
	</p>
	<p>
		<?php echo form_error('passconf'); ?>
		<label for="passconf">Confirm Password: </label>
		<?php echo form_password('passconf', set_value('passconf')); ?>
	</p>
	<p>
		<?php echo form_error('name'); ?>
		<label for="name">Nama: </label>
		<?php echo form_input('name', set_value('name')); ?>
	</p>
	<p>
		<?php echo form_error('hometown'); ?>
		<label for="hometown">Asal: </label>
		<?php echo form_input('hometown' , set_value('hometown')); ?>
	</p>
	<p>
		<?php echo form_error('affiliation'); ?>
		<label for="affiliation">Afiliasi (universitas/kantor saat ini): </label>
		<?php echo form_input('affiliation', set_value('affiliation')); ?>
	</p>
	<p>
		<?php echo form_error('arrival_date'); ?>
		<label for="arrival_date">Tahun tiba di Jepang: (YYYY) </label>
		<?php echo form_input('arrival_date', set_value('arrival_date')); ?>
	</p>
	<p>
		<?php echo form_error('birthday'); ?>
		<label for="birthday">Tanggal lahir: (YYYY/MM/DD) </label>
		<?php echo form_input('birthday' , set_value('birthday')); ?>
	</p>
	<p>
		<?php echo form_error('marriage_status'); ?>
		<label for="marriage_status">Status: </label>
		<?php echo form_dropdown('marriage_status', array('Menikah', 'Lajang'), set_value('marriage_status')); ?>
	</p>
	<p>
		<?php echo form_error('gender'); ?>
		<label for="gender">Jenis kelamin: </label>
		<?php echo form_dropdown('gender', array('Pria', 'Wanita') , set_value('gender')); ?>
	</p>
	<p>
		<?php echo form_error('religion'); ?>
		<label for="religion">Agama: </label>
		<?php echo form_input('religion', set_value('religion')); ?>
	</p>
	<p>
		<?php echo form_error('introduction'); ?>
		<label for="introduction">Bio: </label>
		<?php echo form_textarea('introduction', set_value('introduction')); ?>
	</p>
	<p>
		<?php echo form_error('undergrad_university'); ?>
		<label for="undergrad_university">Universitas S1: </label>
		<?php echo form_input('undergrad_university', set_value('undergrad_university')); ?>
	</p>
	<p>
		<?php echo form_error('undergrad_department'); ?>
		<label for="undergrad_department">Jurusan S1: </label>
		<?php echo form_input('undergrad_department', set_value('undergrad_department')); ?>
	</p>
	<p>
		<?php echo form_error('undergrad_graduation_year'); ?>
		<label for="undergrad_graduation_year">Tahun lulus S1: </label>
		<?php echo form_input('undergrad_graduation_year', set_value('undergrad_graduation_year')); ?>
	</p>
	<p>
		<?php echo form_error('master_university'); ?>
		<label for="master_university">Universitas S2: </label>
		<?php echo form_input('master_university', set_value('master_university')); ?>
	</p>
	<p>
		<?php echo form_error('master_department'); ?>
		<label for="master_department">Jurusan S2: </label>
		<?php echo form_input('master_department', set_value('master_department')); ?>
	</p>
	<p>
		<?php echo form_error('master_graduation_year'); ?>
		<label for="master_graduation_year">Tahun lulus S2: </label>
		<?php echo form_input('master_graduation_year', set_value('master_graduation_year')); ?>
	</p>
	<p>
		<?php echo form_error('phd_university'); ?>
		<label for="phd_university">Universitas S3: </label>
		<?php echo form_input('phd_university', set_value('phd_university')); ?>
	</p>
	<p>
		<?php echo form_error('phd_department'); ?>
		<label for="phd_department">Jurusan S3: </label>
		<?php echo form_input('phd_department', set_value('phd_department')); ?>
	</p>
	<p>
		<?php echo form_error('phd_graduation_year'); ?>
		<label for="phd_graduation_year">Tahun lulus S3: </label>
		<?php echo form_input('phd_graduation_year', set_value('phd_graduation_year')); ?>
	</p>
	<p>
		<?php echo form_error('informal_skill'); ?>
		<label for="informal_skill">Keahlian informal: </label>
		<?php echo form_input('informal_skill', set_value('informal_skill')); ?>
	</p>
	<p>
		<?php echo form_error('left_the_country'); ?>
		<label for="left_the_country">Masih berada di Jepang: </label>
		<?php echo form_dropdown('left_the_country', array('Ya', 'Tidak'), set_value('left_the_country')); ?>
	</p>
	<p>
		<?php echo form_error('position'); ?>
		<label for="position">Jabatan di PPI ON: </label>
		<?php echo form_input('position', set_value('position')); ?>
	</p>
	<p>
		<?php echo form_submit('submit','Bikin akun'); ?>
	</p>

	<?php echo form_close(); ?>
</div>

</body>
</html>