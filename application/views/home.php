<div id="home" class="container">
	<div class="row">
		<div class="span16"  id="flickr">
			<center><a href="http://www.flickr.com/photos/ppi-on/"  target="_blank" title="hanami2011-2 by PPI-ON, on Flickr"><img src="http://farm6.static.flickr.com/5224/5610026711_f7b4925fb0_b.jpg" height="400" alt="hanami2011-2"></a></center>
		</div>
	</div>
	<div class="row">
		<div class="span-one-third">
		<div id="about">
			<? include("static/aboutppion.html"); ?>
		</div>
		</div>
		<div class="span-one-third">
			<div id="recent_posts">
			<h2>Artikel terbaru</h2>
			<ul class="newposts">
			<?php  
				foreach ($posts as $post) {
					echo '<li style="margin-left:-25px"><a href="/posts/'.$post->getId().'">'.$post->getTitle().'</a></li>';
				}
			?>
			</ul>
			</div>
		</div>
		<div class="span-one-third">
		<div id="recent_events">
			<h2>Kegiatan terbaru</h2>
			<ul class="newposts">
			<?php  
				foreach ($events as $event) {
					echo '<li style="margin-left:-25px"><a href="/events/'.$event->getId().'">'.$event->getName().'</a></li>';
				}
			?>
			</ul>
			</div>
		</div>
		</div>
	</div>
</div>