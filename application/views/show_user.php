<div id="user" class="container">
	<div class="row">
		<div class="span6 columns">
			<div class="media-grid">
				<a href="#">
				  <img class="thumbnail" src="http://placehold.it/330x230" alt="">
				</a>
			</div>
		</div>
		<div class="span10 columns">
			<div class="page-header"><h1><?php echo $member->getName(); ?></h1></div>
			<div id="email">
				<?php echo $member->getEmail();?>
			</div>
			<div id="hometown">
				<?php echo $member->getHometown();?>
			</div>
			<?php echo $member->getAffiliation(); ?>
			<?php 
				if (count($member->getContacts()) > 0) {
			?>
			<div id="contacts">
				Kontak: <?php foreach ($member->getContacts() as $contact) { ?>
					<div id="contact">
						<?php echo '    - '.$contact->getAddress().' ('.$contact->getType().')<br/>';?>
					</div>
			<?php }} ?>
			
			</div>
		</div>
	</div>
</div>