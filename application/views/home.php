<div id="home" class="container">
	<div class="row">
		<div class="span12"  id="flickr">
			<center><a href="http://www.flickr.com/photos/ppi-on/"  target="_blank" title="hanami2011-2 by PPI-ON, on Flickr"><img src="http://farm6.static.flickr.com/5224/5610026711_f7b4925fb0_b.jpg" height="400" alt="hanami2011-2"></a></center>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="span4">
		<div id="about" class="well">
			<? include("static/aboutppion.html"); ?>
		</div>
		</div>
		<div class="span4">
			<div id="recent_posts">
			<h2>Artikel terbaru</h2>
			<ul class="nav nav-tabs nav-stacked">
			<?php  
				foreach ($posts as $post) {
					echo '<li><a href="'.base_url().'posts/show/'.$post->getId().'">'.$post->getTitle().'</a></li>';
				}
			?>
			</ul>
			</div>
		</div>
		<div class="span4">
		<div id="recent_events">
			<!--<h2>Kegiatan terbaru</h2>
			<ul class="newposts">
			<?php  
				foreach ($events as $event) {
					echo '<li style="margin-left:-25px"><a href="'.base_url().'events/show/'.$event->getId().'">'.$event->getName().'</a></li>';
				}
			?>
			</ul>-->
			<center><img src="<?php echo base_url().'images/ppionlogo.png'; ?>" height="160"></center>
			</div>
		</div>
		</div>
	</div>
</div>