<div class="alert-message warning hide fade in" data-alert="alert" id="likeAlert">
  <a class="close" href="#">x</a>
  <p><strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.</p>
</div>
<div id="post">
	<div class="page-header">
	<h2><?php echo $post->getTitle(); ?></h2>
	</div>
	<div id='description' class="row">
	<div id='content' class="span10 columns">
		<?php echo nl2br($post->getContent()); ?>
	</div>
	<div id='side' class="span6 columns">
	<div class="row sidePost">
		<div class="media-grid span2 columns">
						<a href="#">
						  <img class="thumbnail" src="http://placehold.it/90x90" alt="">
						</a>
					</div>
		<div class="span3 columns sidePostName"><a href="/members/<?php echo $post->getUser()->getId();?>" class="userName"><strong><?php echo $post->getUser()->getName(); ?></strong></a>
		on <?php echo $post->getCreatedAt()->format('l F j, Y g:i a e'); ?></div>
	</div>
	<div class="row sidePost">
		<div class="media-grid span5 columns">
			<a href="#" class="label notice like" onclick="return false;" style="display: <?php echo ($liked==0)? '':'none' ?>">Like this article</a>
			<a href="#" class="label success liked" onclick="return false;" style="display: <?php echo ($liked==0)? 'none':'' ?>">You have liked this article</a>
		</div>
	</div>
	</div>
	</div>
	<div class="row"><div class="span10 columns"><div class="post-footer">
	Tags: <?php echo implode(', ', $post->getTagsNameArray()); ?>
	</div></div></div>
	<section>
	<h2>Comments</h2>
	<div class="row">
	<div class="span10 columns">
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
					echo '<a href="/members/'.$comment->getUser()->getId().'" class="userName"><strong>'.$comment->getUser()->getName().'</strong></a>&nbsp'.$comment->getContent();
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
				<form action="posts/comment">
				<?php 
					$data = array(
								'name' => 'comment',
								'value' => set_value('comment'),
								'class' => 'large'
							);?>
				<textarea class="span8 commentInput" name="comment" type="textarea" placeholder="Tulis komen disini" rows="1"></textarea>
			</div>
			<div class="span1 columns commentButton">
				<button type="submit" class="btn primary">Submit</button>
			</div>
				<?php echo form_close(); ?>
			</div>
	</div>
	</div>
	</section>
</div>

<script>

var postId = '<?php echo $post->getId(); ?>';

	$(".like").click(function(e){
	     // stop normal link click
	     e.preventDefault(); 
	     $.post('/favorites/add',{post_id:postId, csrf_test_name:$.cookie("csrf_cookie_name")},function(data) {
	     	if (data.result == '1') {
	     		$('.like').hide();
	     		$('.liked').fadeIn();
	     	}
	     	return false;
	     },
	     "json");
	});
</script>