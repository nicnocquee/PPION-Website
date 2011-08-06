<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Members</title>
</head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.js"></script>

<body>

<div id="members">

	<p class="heading">Members</p>
	<table border=1>
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Hometown</th>
		<th>Gender</th>
		<th>Religion</th>
		<th>Contact information</th>
	</tr>
	<?php foreach ($members as $member) { ?>
	<tr>
		<td><?php echo $member->getName();?></td>
		<td><?php echo $member->getEmail();?></td>
		<td><?php echo $member->getHometown();?></td>
		<td><?php echo $member->getGender();?></td>
		<td><?php echo $member->getReligion();?></td>
		<td>
			<?php foreach ($member->getContacts() as $contact) { ?>
				<?php echo $contact->getAddress().'('.$contact->getType().')<br/>';?>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>
	</table>
</div>

</body>
</html>