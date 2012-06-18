<div id="newpost_form" class="span12">
	<?php 
		echo form_open('posts/submit', array('id' => 'newpost_form')); 
		if ($post) { ?>
			<input type="hidden" name="edit" value="1">
			<input type="hidden" name="post_id" value="<?php echo $post->getId(); ?>">
		<? } else { ?>
			<input type="hidden" name="edit" value="0">
		<? }
	
	?>
	
	<div class="<?php if(form_error('title')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="title">Judul: </label>
		<div class="input">
		<?php 
			$title = set_value('title');
			if ($post) $title = $post->getTitle();
			$data = array(
						'name' => 'title',
						'value' => $title,
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('title'); ?></span>
		</div>
	</div>
	
			
	
	<div class="<?php if(form_error('content')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="content">Isi: </label>
		<script src="<?php echo(base_url().'js/nicEdit/nicEdit.js') ?>" type="text/javascript"></script>
		<script type="text/javascript">bkLib.onDomLoaded(function() {new nicEditor({fullPanel: true, uploadURI : '<?php echo(base_url().'js/nicUpload.php'); ?>', iconsPath: '<?php echo(base_url().'js/nicEdit/nicEditorIcons.gif') ?>'}).panelInstance('area2');	
			}
		);</script>
		<textarea name="content" id="area2" style="width: 100%; height: 100px;">
		       <?php if ($post) echo($post->getContent()); ?>
		</textarea>						
		<!--<div class="wmd-panel">
		<div class="input">
			<div id="wmd-button-bar"></div>
		<?php 
			$content = set_value('content');
			if ($post) $content = $post->getContent();
			$data = array(
						'name' => 'content',
						'value' => $content,
						'class' => 'xxlarge wmd-input',
						'id' => 'wmd-input'
					);
		echo form_textarea($data); ?>
		<span class="help-block">Use <a href="http://daringfireball.net/projects/markdown/">Markdown</a> syntax to format your post. For example, 
		<br />Italic and Bold: *italic* **bold**
		<br />Link: An [example](http://url.com/ "Title")
		<br />Image: ![alt text](/path/img.jpg "Title")
		<br />Blank line to add new line.
		<br />Check <a href="http://daringfireball.net/projects/markdown/dingus">here</a> for more syntaxes.</span>
		<span class="help-inline"><?php echo form_error('content'); ?></span>
		</div>
		</div>-->
	</div>
	
	<!--<div class="clearfix">
		<label for="upload">Upload image: </label>
		<div class="input">
			<input id="fileupload" type="file" name="userfile" multiple><div class="meter orange nostripes" style="display: none">
				<span style="width: 30%"></span>
			</div>
			<span class="help-block">Allowed file types: JPG, PNG. <strong>Max size 600x600 px</strong>. <strong id="image-help" style="display: none">Click on the image(s) below to insert it to the post.</strong></span>
			<div class="imagepreviews" style="display: none">
			</div>
			<script src="<?php echo base_url(); ?>js/upload/jquery.iframe-transport.js"></script>
			<script src="<?php echo base_url(); ?>js/upload/jquery.fileupload.js"></script>
			<script>
			$(function () {
				var thumbnailindex = 0;
			    $('#fileupload').fileupload({
			        dataType: 'json',
			        url: '<?php echo base_url(); ?>upload/doupload/',
			        done: function (e, data) {
			            $.each(data.result, function (index, file) {
			                var url = "<?php echo base_url(); ?>uploads/"+file.name;
			                $('.imagepreviews').show();
			                $('#image-help').show();
			                var thumbnail = "thumbnail-"+thumbnailindex;
			                $('.imagepreviews').append("<img src=\""+url+"\" class=\""+thumbnail+"\">");
			                $(".thumbnail-"+thumbnailindex).click(function () {
								var imageURL = this.src;
								$('#wmd-input').val($('#wmd-input').val()+"\n<img src=\""+imageURL+"\" width=\"400\">");
								editor1.refreshPreview();
			                });
			                thumbnailindex = thumbnailindex + 1;
			            });			            
			        }
			    });
			});
			$('#fileupload').bind('fileuploadstart', function (e) {
				$('.meter').show();
			});
			$('#fileupload').bind('fileuploaddone', function (e) {
				$('.meter').hide();
			});
			$('#fileupload').bind('fileuploadfail', function (e) {
				$('.meter').hide();
			});
			
			$('#fileupload').bind('fileuploadprogressall', function (e, data) {
			    var progress = parseInt(data.loaded / data.total * 100, 10);
			    //console.log(progress);
			    $(".meter > span").data("origWidth", progress)
				    .width($(".meter > span").width())
				    .animate({
				    	width: $(".meter > span").data("origWidth")
				    }, 1200);
			});
			</script>
		</div>
	</div>-->
	
	
	<div class="<?php if(form_error('tags')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="tags">Tags (comma separated): </label>
		<div class="input">
		<?php 
			$tags = set_value('tags');
			if ($post) $tags = implode(', ', $post->getTagsNameArray());
			$data = array(
						'name' => 'tags',
						'value' => $tags,
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
<!--<div class="row">
	<div class="span16 preview">
		<h2>Preview</h2>
		<div class="wmd-preview post-preview" id="wmd-preview"></div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Converter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Editor.js"></script>
<script type="text/javascript">
	var editor1;
    (function () {
        var converter1 = Markdown.getSanitizingConverter();
        editor1 = new Markdown.Editor(converter1);
        editor1.run();
    })();
</script>-->

<!--<script src="<?php echo base_url(); ?>js/cookie/jquery.cookie.js"></script>
<script type="text/javascript">
	$("#mytext").keyup(function() {
		var cct = $.cookie('csrf_cookie_name');
		console.log(cct);
		$.ajax({
		  type: "POST",
		  url: "<?php echo base_url(); ?>markdown/convert",
		  data: "text="+$("#mytext").val()+"&csrf_token_name="+cct,
		}).done(function( msg ) {
		  $('.preview').show();
		  $('.previewcontent').html(msg);
		});
		//$.post("<?php echo base_url(); ?>markdown/convert/", function(data) {
		//   $('.preview').show();
		//     $('.previewcontent').text(data);
		// });
	
	});
</script>-->