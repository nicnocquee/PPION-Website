<table class="borderless-table">
<tbody>
<?php 
	foreach ($posts as $post) { 
		
	?>
			<tr class="color-on-hover">
				<td><h3><a href="<?php echo base_url().'posts/'.$post->getId(); ?>"><?php echo $post->getTitle(); ?></a></h3>
				<?php  
					echo time_diff(now()-$post->getCreatedAt()->getTimeStamp())." ago";
				?>&nbsp;
				<a href="<?php echo base_url().'posts/edit/'.$post->getId(); ?>">Edit</a>&nbsp;
				<a href="<?php echo base_url().'posts/delete/'.$post->getId(); ?>">Delete</a>
				</td>
			</tr>
	<? }
?>
</tbody>
</table>