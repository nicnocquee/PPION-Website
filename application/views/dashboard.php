<div class="container">
<div class="row">
	<div class="span12" style="text-align: right">
		<a href="<?php echo base_url(); ?>posts/add" class="btn large primary">Bikin Artikel Baru</a>
			<!--<a href="<?php echo base_url(); ?>events/add" class="btn large success">Bikin Event Baru</a>-->
	</div>
</div>
<br />
<div class="row">
<div class="span12">
	<div class="row">
		<div class="span12">
			<ul class="nav nav-tabs">
				<li class="active activities-tab"><a href="javascript:activities()">Aktivitas</a></li>
				<li class="myarticles-tab"><a href="javascript:myarticles()">Artikelku</a></li>
				<!--<li class="myevents-tab"><a href="javascript:myevents()">Eventku</a></li>-->
				<!--<li class="myfavoritearticles-tab"><a href="javascript:myfavoritearticles()">Artikel Favorit</a></li>-->
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<div class="dashboard-content">
			
			</div>
		</div>
	</div>
</div>
<!--<div class="span4 sidebar">
	<h3>Most favorite articles</h3>
	<ul>
		<li><a href="#">Artikel 1</a></li>
		<li><a href="#">Artikel 1</a></li>
		<li><a href="#">Artikel 1</a></li>
	</ul>
	<h3>Most discussed articles</h3>
	<ul>
		<li><a href="#">Artikel 1</a></li>
		<li><a href="#">Artikel 1</a></li>
		<li><a href="#">Artikel 1</a></li>
	</ul>
</div>-->
</div>
</div>

<script type="text/javascript">
	function fillDashboardContent(target) {
		$.get("<?php echo base_url(); ?>dashboard/"+target, function(data) {
		    $('.dashboard-content').html(data);
		});
	}
	
	function myarticles() {
		$('.myarticles-tab').addClass("active");
		$('.activities-tab').removeClass("active");
		$('.myevents-tab').removeClass("active");
		$('.myfavoritearticles-tab').removeClass("active");
		fillDashboardContent("myposts");
	}
	function activities() {
		$('.myarticles-tab').removeClass("active");
		$('.activities-tab').addClass("active");
		$('.myevents-tab').removeClass("active");
		$('.myfavoritearticles-tab').removeClass("active");
		fillDashboardContent("activities");
	}
	
	function myevents() {
		$('.myarticles-tab').removeClass("active");
		$('.activities-tab').removeClass("active");
		$('.myevents-tab').addClass("active");
		$('.myfavoritearticles-tab').removeClass("active");
		fillDashboardContent("myevents");
	}
	
	function myfavoritearticles() {
		$('.myarticles-tab').removeClass("active");
		$('.activities-tab').removeClass("active");
		$('.myevents-tab').removeClass("active");
		$('.myfavoritearticles-tab').addClass("active");
		fillDashboardContent("myfavoriteposts");
	}
	
	$(window).load(fillDashboardContent("activities"));
</script>