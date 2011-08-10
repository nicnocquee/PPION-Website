<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>User</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

<body>

<div id="user">

	<p class="heading">User</p>
	<div id="name">
		Name: <?php echo $member->getName(); ?>
	</div>
	<div id="email">
		Email: <?php echo $member->getEmail();?>
	</div>
	<div id="hometown">
		Asal: <?php echo $member->getHometown();?>
	</div>
	<div id="gender">
		Jenis kelamin: <?php echo $member->getGender();?>
	</div>
	<div id="religion">
		Agama: <?php echo $member->getReligion();?>
	</div>
	<div id="contacts">
		Kontak: <?php foreach ($member->getContacts() as $contact) { ?>
			<div id="contact">
				<?php echo $contact->getAddress().'('.$contact->getType().')<br/>';?>
			</div>
	<?php } ?>
	</div>
</div>

</body>
</html>