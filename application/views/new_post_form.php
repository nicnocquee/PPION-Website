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
	
	
	<div class="<?php if(form_error('content')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="content">Isi: </label>
		<div class="wmd-panel">
		<div class="input">
			<div id="wmd-button-bar"></div>
		<?php 
			$data = array(
						'name' => 'content',
						'value' => set_value('content'),
						'class' => 'xxlarge wmd-input',
						'id' => 'wmd-input'
					);
		echo form_textarea($data); ?>
		<span class="help-block">Use <a href="http://daringfireball.net/projects/markdown/">Markdown</a> syntax to format your post. For example, 
		<br />Italic and Bold: *italic* **bold**
		<br />Link: An [example](http://url.com/ "Title")
		<br />Image: ![alt text](/path/img.jpg "Title")
		<br />Check <a href="http://daringfireball.net/projects/markdown/dingus">here</a> for more syntaxes.</span>
		<span class="help-inline"><?php echo form_error('content'); ?></span>
		</div>
		</div>
	</div>
	
	<div class="clearfix">
		<label for="upload">Upload image: </label>
		<div class="input">
			<input id="fileupload" type="file" name="userfile" multiple><div class="meter orange nostripes" style="display: none">
				<span style="width: 30%"></span>
			</div>
			<div class="imagepreviews" style="display: none">
			</div>
			<script src="<?php echo base_url(); ?>js/upload/jquery.iframe-transport.js"></script>
			<script src="<?php echo base_url(); ?>js/upload/jquery.fileupload.js"></script>
			<script>
			$(function () {
			    $('#fileupload').fileupload({
			        dataType: 'json',
			        url: '<?php echo base_url(); ?>upload/do_upload/',
			        done: function (e, data) {
			            $.each(data.result, function (index, file) {
			                //$('<p/>').text(file.name).appendTo('body');
			                var url = "<?php echo base_url(); ?>uploads/"+file.name;
			                console.log(url);
			                $('.imagepreviews').show();
			                $('.imagepreviews').append("<img src=\""+url+"\" class=\"thumbnail\">");
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
<div class="row">
	<div class="span16 preview">
		<h2>Preview</h2>
		<div class="wmd-panel wmd-preview" id="wmd-preview"></div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Converter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Sanitizer.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/pagedown/Markdown.Editor.js"></script>
<script type="text/javascript">
            (function () {
                var converter1 = Markdown.getSanitizingConverter();
                var editor1 = new Markdown.Editor(converter1);
                editor1.run();
                
                var converter2 = new Markdown.Converter();

                converter2.hooks.chain("preConversion", function (text) {
                    return text.replace(/\b(a\w*)/gi, "*$1*");
                });

                converter2.hooks.chain("plainLinkText", function (url) {
                    return "This is a link to " + url.replace(/^https?:\/\//, "");
                });
                
                var help = function () { alert("Do you need help?"); }
                
                var editor2 = new Markdown.Editor(converter2, "-second", { handler: help });
                
                editor2.run();
            })();
        </script>

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