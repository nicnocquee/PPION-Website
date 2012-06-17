<div id="post">
	<div class="page-header">
	<h2><?php echo $post->getTitle(); ?></h2>
	<div class="postTitleDate"><small class="postTitleDate">by <a href="/members/<?php echo $post->getUser()->getId();?>" class="userName"><strong><em><?php echo $post->getUser()->getName(); ?></em></strong></a> on <?php echo $post->getCreatedAt()->format('l F j, Y, g:i a'); ?></small></div>
	</div>
	
	<div id='description' class="row">
	<div id='content' class="span12">
		<?php echo $this->mymarkdown->convert(nl2br($post->getContent())); ?>
	</div>
	
	</div>
	<div class="row"><div class="span10 columns"><div class="post-footer">
	Tags: <?php echo implode(', ', $post->getTagsNameArray()); ?>
	</div></div></div>
	
	<div class="page-header">
	<h2>Comments</h2><?php if (!models\Current_User::user()) { ?><span class="label label-warning">Login to comment</span>
	<?php } ?>
	</div>
	<div class="row">
	
	<div class="span12">
	<?php
		if (isset($comments) && count($comments)>0) {
			foreach($comments as $comment){
			?>
			<div class="row commentBox">
				<div class="span2 columns">
					<div class="media-grid">
						<a href="#">
						  <img class="thumbnail" src="http://placehold.it/90x90" alt="">
						</a>
					</div>
				</div>
				<div class="span7 columns">
				<?php
					echo '<a href="'.base_url().'members/'.$comment->getUser()->getId().'" class="userName"><strong>'.$comment->getUser()->getName().'</strong></a>&nbsp'.$comment->getContent();
					echo '<p class="commentDate">'.$comment->getCreatedAt()->format('l F j, Y g:i a').'</p>';
				?>
				</div>
			</div>
			<?php } ?>
			
		<?php } else {
			?>
			<div class="alert-message warning">
			  Belum ada komen.
			</div>
			<?php
		}
	?>
	<div class="row commentBox commentInputBox">
			<div class="span8 columns">
				<?php if (models\Current_User::user()) { ?>
				<?php echo form_open('posts/comment/'.$post->getId());  ?>
				<?php 
					$data = array(
								'name' => 'comment',
								'value' => ($comment_content != NULL)?$comment_content:set_value('comment'),
								'class' => 'large'
							);?>
				<textarea class="span8 commentInput" name="comment" type="textarea" placeholder="Tulis komen disini" rows="1"><?php 
					if ($comment_content != NULL) {
						echo $comment_content;
					} else echo '';
				?></textarea></div>
			<div class="span1 columns commentButton">
				<input type="submit" class="btn primary">
			</div>
				<?php echo form_close(); ?>
			</div>
			<?php  }?>
	</div>
	</div>
</div>

<script>

var postId = '<?php echo $post->getId(); ?>';

	$(".like").click(function(e){
	     // stop normal link click
	     e.preventDefault(); 
	     $.post('<?php echo base_url(); ?>favorites/add',{post_id:postId, csrf_token_name:$.cookie("csrf_cookie_name")},function(data) {
	     	if (data.result == '1') {
	     		$('.like').hide();
	     		$('.liked').fadeIn();
	     	}
	     	return false;
	     },
	     "json");
	});
</script>