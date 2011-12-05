<table class="borderless-table">
<tbody class="posts">

</tbody>
<tr class="load-more color-on-hover">
<td><center><a href="javascript:loadmore()" class="loadmorelink">Load more ...</a></center></td>
</tr>
</table>

<script type="text/javascript">
	var page=0;
	function loadmore() {
		$.get("<?php echo base_url(); ?>dashboard/mypostsbody/"+page, function(data) {
			if (data) {
				$('.posts').append(data);
				page=page+10;
			} else {
				console.log('here?');
				$('.load-more').remove();
			}
		    
		});
	}	
	
	function deletePost(id) {
		var r=confirm("Are you sure?");
		if (r==true)
		  {
		  	$.getJSON("<?php echo base_url(); ?>posts/delete/"+id, function(data) {
		  		if (data) {
		  			$(".post-"+id).remove();
		  		}
		  	    
		  	});
		  }
	}
	
	$(window).load(loadmore());
</script>