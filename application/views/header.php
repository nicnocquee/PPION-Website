<div class="topbar">
  <div class="fill">
	<div class="container">
	  <h3><a href="<?php echo base_url(); ?>home">PPION</a></h3>
	  <ul>
		<li <?php if ($template['title'] == 'Articles') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>posts">Artikel</a></li>
		<!--<li <?php if ($template['title'] == 'Events') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>events">Event</a></li>-->
		<li <?php if ($template['title'] == 'Members') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>members">Anggota</a></li>
		<li><a href="http://www.flickr.com/photos/ppi-on/"  target="_blank">Gallery</a></li>
	  </ul>
	<ul class="nav secondary-nav">
	<?php  
		$user = models\\Current_User::user();
		if (!$user) { ?>
			<?php echo form_open('login/submit'); ?>
				<input class="input-small" type="text" placeholder="E-mail" name="email">
				<input class="input-small" type="password" placeholder="Password" name="password">
				<button class="btn primary" type="submit">Log in</button>
			  </form>
			  &nbsp;<button onClick="window.location='<?php echo base_url(); ?>signup'" type="signup" class="btn success small" style="margin-top: 5px">Belum punya akun?</button>
		<? } else { ?>
			<li class="dropdown" data-dropdown="dropdown" >
				<a href="#" class="dropdown-toggle"><?php echo $user->getName(); ?></a>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo base_url(); ?>dashboard/">Dashboard</a></li>
					  <li><a href="<?php echo base_url(); ?>posts/add">Bikin Artikel Baru</a></li>
					  <!--<li><a href="<?php echo base_url(); ?>events/add">Bikin Event Baru</a></li>-->
					  <li class="divider"></li>
					  <li><a href="<?php echo base_url(); ?>logout">Log out</a></li>
					</ul>
				</li>
		
		<? }
	?>		
	  </ul>
	  <div class="beta"><img src="<?php echo base_url(); ?>images/beta.png"></div>
	</div>
  </div> <!-- /fill -->
</div> <!-- /topbar -->
