<?php echo form_open('login/submit'); ?>	
	<div class="<?php if(form_error('email')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="email">E-mail: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'email',
						'value' => set_value('email'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('email'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('password')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="password">Password: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'password',
						'value' => set_value('password'),
						'class' => 'xlarge'
					);
		echo form_password($data); ?>
		<span class="help-inline"><?php echo form_error('password'); ?></span>
		</div>
	</div>
	<div class="actions">
    	<button type="submit" class="btn primary enabled">Login</button>&nbsp; <a href="/signup" class="btn" type="button">Bikin akun</a>
	</div>
<?php echo form_close(); ?>