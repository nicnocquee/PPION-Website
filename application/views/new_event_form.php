<div id="newpost">

	<?php echo form_open('events/submit', array('id' => 'newevent_form')); ?>
	<div class="<?php if(form_error('name')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="name">Nama: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'name',
						'value' => set_value('name'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('name'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('description')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="description">Deskripsi: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'description',
						'value' => set_value('description'),
						'class' => 'xxlarge'
					);
		echo form_textarea($data); ?>
		<span class="help-inline"><?php echo form_error('description'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('place')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="place">Tempat: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'place',
						'value' => set_value('place'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('place'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('deadline')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="deadline">Tenggat waktu pendaftaran (YYYY/MM/DD): </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'deadline',
						'value' => set_value('deadline'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('deadline'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('time-start')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="time-start">Waktu mulai (YYYY/MM/DD HH:MM): </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'time-start',
						'value' => set_value('time-start'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('time-start'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('time-end')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="time-end">Waktu selesai (YYYY/MM/DD HH:MM):</label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'time-end',
						'value' => set_value('time-end'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('time-end'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('cost')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="cost">Biaya:</label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'cost',
						'value' => set_value('cost'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('cost'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('limitation')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="limitation">Batasan:</label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'limitation',
						'value' => set_value('limitation'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('limitation'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('tags')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="tags">Tags (comma separated):</label>
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
          <button type="submit" class="btn primary">Submit</button>&nbsp; <a href="/events" class="btn">Cancel</a>
    </div>
	<?php echo form_close(); ?>
</div>