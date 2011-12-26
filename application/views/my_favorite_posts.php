<table class="borderless-table">
<tbody>
<?php 
	foreach ($favorites as $favorite) { 
		
	?>
			<tr class="color-on-hover">
				<td><a href="<?php echo base_url().'posts/show/'.$favorite['post_id']; ?>"><?php echo $favorite['title']; ?></a></td>
				<td><?php echo $favorite['_created_at']; ?></td>
			</tr>
	<? }
?>
</tbody>
</table>