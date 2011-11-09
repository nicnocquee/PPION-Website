<ul>
<?php 
	foreach ($activities as $activity) { 
		
	?>
			<li>
				<a href="<?php echo $activity['user_link']; ?>"><?php echo $activity['user_name']; ?></a>&nbsp;<?php echo $activity['activity_name']; ?>&nbsp;<?php echo $activity['target_type']; ?>, <a href="<?php echo $activity['target_link'] ?>"><?php echo $activity['target_title']; ?></a>, on <?php echo $activity['activity_date']; ?>.
			</li>
	<? }
?>
</ul>