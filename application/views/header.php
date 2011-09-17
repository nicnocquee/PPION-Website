<div class="topbar">
  <div class="fill">
	<div class="container">
	  <h3><a href="/home">PPION</a></h3>
	  <ul>
		<li <?php if ($template['title'] == 'Home') echo 'class="active"'; ?>><a href="/home">Home</a></li>
		<li <?php if ($template['title'] == 'Articles') echo 'class="active"'; ?>><a href="/posts">Articles</a></li>
		<li <?php if ($template['title'] == 'Events') echo 'class="active"'; ?>><a href="/events">Events</a></li>
		<li <?php if ($template['title'] == 'Members') echo 'class="active"'; ?>><a href="/members">Members</a></li>
	  </ul>
	  
	<ul class="nav secondary-nav">
	<form action="">
		<input type="text" placeholder="Search" />
	  </form>
 	  <li class="dropdown" data-dropdown="dropdown" >
		<a href="#" class="dropdown-toggle">Setting</a>
		<ul class="dropdown-menu">
		  <li><a href="/posts/add">Create New Post</a></li>
		  <li><a href="/events/add">Create New Event</a></li>
		  <li class="divider"></li>
		  <li><a href="/logout">Logout</a></li>
		</ul>
	  </li>
	  </ul>
	</div>
  </div> <!-- /fill -->
</div> <!-- /topbar -->
