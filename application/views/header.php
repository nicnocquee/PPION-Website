<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
	<div class="container">
	  <a class="brand" href="<?php echo base_url(); ?>home">PPION</a>
	  <ul class="nav">
		<li <?php if ($template['title'] == 'Articles') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>posts">Artikel</a></li>
		<!--<li <?php if ($template['title'] == 'Events') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>events">Event</a></li>-->
		<li <?php if ($template['title'] == 'Members') echo 'class="active"'; ?>><a href="<?php echo base_url(); ?>members">Anggota</a></li>
		<li><a href="http://www.flickr.com/photos/ppi-on/"  target="_blank">Gallery</a></li>
	  </ul>
	<?php  
		$user = models\Current_User::user();
		if (!$user) { ?>
		<button onClick="window.location='<?php echo base_url(); ?>signup'" type="signup" class="btn btn-success pull-right" style="margin-top: 6px">Belum punya akun?</button>
			<?php echo form_open('login/submit', array('class' => 'navbar-search pull-right')); ?>
				<input class="search-query span2" type="text" placeholder="E-mail" name="email">
				<input class="search-query span2" type="password" placeholder="Password" name="password">
				<button class="btn" type="submit" style="margin-top: -1px; height: 27px;">Log in</button>
				
			  </form>
			  
		<? } else { ?>
		<ul class="nav pull-right">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->getName(); ?><b class="caret"></b></a>
					<ul class="dropdown-menu">
					  <li><a href="<?php echo base_url(); ?>dashboard/">Dashboard</a></li>
					  <li><a href="<?php echo base_url(); ?>posts/add">Bikin Artikel Baru</a></li>
					  <!--<li><a href="<?php echo base_url(); ?>events/add">Bikin Event Baru</a></li>-->
					  <li class="divider"></li>
					  <li><a href="<?php echo base_url(); ?>logout">Log out</a></li>
					</ul>
				</li>
		</ul>
		<? }
	?>
	</div>
  </div> <!-- /fill -->
</div> <!-- /topbar -->
 <!--<div class="beta"><img src="<?php echo base_url(); ?>images/beta.png"></div>-->
