<?php 
	foreach ($posts as $post) { 
		
	?>
			<tr class="color-on-hover post-<?php echo $post->getId(); ?>">
				<td><h3><a href="<?php echo base_url().'posts/show/'.$post->getId(); ?>"><?php echo $post->getTitle(); ?></a></h3>
				<?php  
					echo time_diff(now()-$post->getCreatedAt()->getTimeStamp())." ago";
				?>&nbsp;
				<a href="<?php echo base_url().'posts/edit/'.$post->getId(); ?>">Edit</a>&nbsp;
				<a href="javascript:deletePost(<?php echo $post->getId(); ?>)" class="delete-post">Delete</a>
				</td>
			</tr>
	<? }
?>