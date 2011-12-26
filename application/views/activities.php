<table class="borderless-table">
<tbody>
<?php 
	foreach ($activities as $activity) { 
		
	?>
			<tr class="color-on-hover">
				<td><a href="<?php echo base_url().'members/'.$activity['user_id']; ?>"><?php echo $activity['user_name']; ?></a> <?php echo $activity['action']; ?> <a href="<?php echo base_url().'posts/show/'.$activity['post_id']; ?>"><?php echo $activity['title']; ?></a>.</td>
				<td><?php echo $activity['_created_at']; ?></td>
			</tr>
	<? }
?>
</tbody>
</table>