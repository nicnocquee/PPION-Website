<div id="members">
	

<table class="zebra-striped" id="sortTableExample">
<thead>
<tr>
		<th>Nama</th>
		<th>Email</th>
		<th>Asal</th>
		<th>Afiliasi</th>
		<th>Kontak</th>
		<th>Tiba di Jepang</th>
	</tr>
</thead>
<tbody>
	<?php foreach ($members as $member) { ?>
	<tr>
		<td><a href="<?php echo base_url(); ?>members/<?php echo $member->getId();?>" class="userName"><strong><?php echo $member->getName(); ?></strong></a></td>
		<td><?php echo $member->getEmail();?></td>
		<td><?php echo $member->getHometown();?></td>
		<td><?php echo $member->getAffiliation();?></td>
		<td>
			<?php foreach ($member->getContacts() as $contact) { ?>
				<?php echo $contact->getAddress().' ('.$contact->getType().')<br/>';?>
			<?php } ?>
		</td>
		<td><?php echo $member->getArrivalDate()->format('F Y'); ?></td>
	</tr>
	<?php } ?>
</tbody>
</table>
</div>