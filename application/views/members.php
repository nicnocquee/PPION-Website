<div id="members">
	

<table class="zebra-striped" id="sortTableExample">
<thead>
<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Hometown</th>
		<th>Gender</th>
		<th>Religion</th>
		<th>Contact information</th>
	</tr>
</thead>
<tbody>
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
</tbody>
</table>
</div>