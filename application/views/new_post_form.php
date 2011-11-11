<div id="newpost_form" class="span16 columns">
	<?php echo form_open('posts/submit', array('id' => 'newpost_form')); ?>
	<div class="<?php if(form_error('title')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="title">Judul: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'title',
						'value' => set_value('title'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('title'); ?></span>
		</div>
	</div>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jwysiwyg/jquery.wysiwyg.js"></script>
	
	<script type="text/javascript">
		$(function() {
		    $('#wysiwyg').wysiwyg();
		});
	</script>
	<div class="<?php if(form_error('content')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="content">Isi: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'content',
						'value' => set_value('content'),
						'class' => 'xxlarge',
						'id' => 'wysiwyg'
						
					);
		echo form_textarea($data); ?>
		<span class="help-inline"><?php echo form_error('content'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('tags')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="tags">Tags (comma separated): </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'tags',
						'value' => set_value('tags'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('tags'); ?></span>
		</div>
	</div>
	<div class="actions">
          <button type="submit" class="btn primary">Submit</button>&nbsp; <a href="/posts" class="btn">Cancel</a>
    </div>

	<?php echo form_close(); ?>
</div>