<table class="borderless-table">
<tbody>
<?php 
	foreach ($activities as $activity) { 
		
	?>
			<tr class="color-on-hover">
				<td class="avatar"><img src="http://www.dentistry.co.uk/forum/forum_graphics/avatar_placeholder.gif"></td>
				<td><a href="<?php echo $activity['user_link']; ?>"><?php echo $activity['user_name']; ?></a>&nbsp;<?php echo $activity['activity_name']; ?>&nbsp;<?php echo $activity['target_type']; ?>
				<h3><a href="<?php echo $activity['target_link'] ?>"><?php echo $activity['target_title']; ?></a></h3></td>
				<td style="text-align: right" class="date"><?php echo $activity['activity_date']; ?></td>
			</tr>
	<? }
?>
</tbody>
</table>