<div class="topbar">
  <div class="fill">
	<div class="container">
	  <h3><a href="/home">PPION</a></h3>
	  <ul>
		<li <?php if ($template['title'] == 'Articles') echo 'class="active"'; ?>><a href="/posts">Artikel</a></li>
		<li <?php if ($template['title'] == 'Events') echo 'class="active"'; ?>><a href="/events">Event</a></li>
		<li <?php if ($template['title'] == 'Members') echo 'class="active"'; ?>><a href="/members">Anggota</a></li>
	  </ul>
	  
	<ul class="nav secondary-nav">
	<?php  
		$user = models\Current_User::user();
		if (!$user) { ?>
			<?php echo form_open('login/submit'); ?>
				<input class="input-small" type="text" placeholder="E-mail" name="email">
				<input class="input-small" type="password" placeholder="Password" name="password">
				<button class="btn primary" type="submit">Log in</button>
			  </form>
		<? } else { ?>
			<li class="dropdown" data-dropdown="dropdown" >
				<a href="#" class="dropdown-toggle"><?php echo $user->getName(); ?></a>
					<ul class="dropdown-menu">
					  <li><a href="/posts/add">Dashboard</a></li>
					  <li><a href="/posts/add">Bikin Artikel Baru</a></li>
					  <li><a href="/events/add">Bikin Event Baru</a></li>
					  <li class="divider"></li>
					  <li><a href="/logout">Log out</a></li>
					</ul>
				</li>
		
		<? }
	?>		
	  </ul>
	</div>
  </div> <!-- /fill -->
</div> <!-- /topbar -->
