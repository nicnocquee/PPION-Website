<script>
var current = 1;

function addContact() {
	console.log('running addPerson')
	//current keeps track of how many people we have.
	current++;
	var strToAdd = '<div class="clearfix">'+		
			'<label for="name">Address: </label>'+
			'<div class="input">'+
			'<div class="inline-inputs">'+
			'<input type="text" name="address'+current+'" value="" class="xlarge"/>'+	
				' <select name="addresstype'+current+'">'+
					'<option>Phone</option>'+
					'<option>Home Address</option>'+
					'<option>Facebook</option>'+
					'<option>YM</option>'+
					'<option>Twitter</option>'+
				'</select>'+
			'</div>';
	
	console.log(strToAdd);
	$('#contactField').append(strToAdd);
	oFormObject = document.forms['signup_form'];
	oFormObject.elements["number_of_contacts"].value = current;
}

$(document).ready(function(){
	$('#addContact').click(addContact)
});
</script>
<div id="signup_form" class="span16 columns">
	<?php echo form_open('signup/submit', array('id' => 'signup_form')); ?>
	
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
	<div class="<?php if(form_error('passconf')=="") echo "clearfix"; else echo "clearfix error" ?>">		
		<label for="passconf">Confirm Password: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'passconf',
						'value' => set_value('passconf'),
						'class' => 'xlarge'
					);
		echo form_password($data); ?>
		<span class="help-inline"><?php echo form_error('passconf'); ?></span>
		</div>
	</div>
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
	
	<div class="<?php if(form_error('hometown')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="hometown">Asal: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'hometown',
						'value' => set_value('hometown'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('hometown'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('affiliation')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="affiliation">Afiliasi: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'affiliation',
						'value' => set_value('affiliation'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('affiliation'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('arrival_date')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="arrival_date">Tahun tiba di Jepang: (YYYY/MM/DD) </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'arrival_date',
						'value' => set_value('arrival_date'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('arrival_date'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('birthday')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="birthday">Tanggal lahir: (YYYY/MM/DD) </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'birthday',
						'value' => set_value('birthday'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('birthday'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('marriage_status')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="marriage_status">Status: </label>
		<div class="input">
		<select>
			<option>Menikah</option>
			<option>Lajang</option>
		</select>
		<span class="help-inline"><?php echo form_error('marriage_status'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('gender')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="gender">Jenis kelamin: </label>
		<div class="input" name="gender">
		<select>
			<option>Wanita</option>
			<option>Pria</option>
		</select>
		<span class="help-inline"><?php echo form_error('gender'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('religion')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="religion">Agama: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'religion',
						'value' => set_value('religion'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('religion'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('introduction')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="introduction">Bio: </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'introduction',
						'value' => set_value('introduction'),
						'class' => 'xxlarge'
					);
		echo form_textarea($data); ?>
		<span class="help-inline"><?php echo form_error('introduction'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('left_the_country')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="left_the_country">Masih berada di Jepang: </label>
		<div class="input">
		<select>
			<option>Ya</option>
			<option>Tidak</option>
		</select>
		<span class="help-inline"><?php echo form_error('left_the_country'); ?></span>
		</div>
	</div>
	<div class="<?php if(form_error('position')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="position">Jabatan di PPI ON:  </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'position',
						'value' => set_value('position'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('position'); ?></span>
		</div>
	</div>
		<?php echo form_fieldset('Contact Information');?>
		<div id="contactField">
		<div class="clearfix">		
		<label for="name">Address: </label>
		<div class="input">
		<div class="inline-inputs">
		<?php 
			$data = array(
						'name' 	=> 'address1',
						'value' => set_value('address1'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		
			<select>
				<option>Phone</option>
				<option>Home Address</option>
				<option>Facebook</option>
				<option>YM</option>
				<option>Twitter</option>
			</select>
		</div>
	</div>
	</div>
	</div>
	
	<div class="input">
	<input type="button" id="addContact" value="Add Another Contact Information" class="btn">
	</div>
	<?php echo form_fieldset_close(); ?>
	<p>
		<?php echo form_hidden('number_of_contacts', 1); ?>
	</p>
	
	<?php
		echo form_fieldset('Education', array('id'=>'education'));
		$educations = array(
			array(
				'undergrad_university' => 'Universitas S1:',
				'undergrad_department' => 'Jurusan S1:',
				'undergrad_graduation_year' => 'Tahun lulus S1:'
			),
			array(
				'master_university' => 'Universitas S2:',
				'master_department' => 'Jurusan S2:',
				'master_graduation_year' => 'Tahun lulus S2:'
			),
			array(
				'phd_university' => 'Universitas S3:',
				'phd_department' => 'Jurusan S3:',
				'phd_graduation_year' => 'Tahun lulus S3:'
			),
		);
		
		foreach ($educations as $education) {?>
			<fieldset>
			<?php foreach ($education as $key => $value) {?>
				<div class="<?php if(form_error($key)=="") echo "clearfix"; else echo "clearfix error" ?>">
					<label for="<?php $key;?>"><?php echo $value; ?> </label>
					<div class="input">
					<?php 
						$data = array(
									'name' => $key,
									'value' => set_value($key),
									'class' => 'xlarge'
								);
					echo form_input($data); ?>
					<span class="help-inline"><?php echo form_error($key); ?></span>
					</div>
				</div>
			<?php } ?>
			</fieldset>
		<?php }
	?>
	<?php echo form_fieldset_close(); ?>
	
	<div class="<?php if(form_error('informal_skill')=="") echo "clearfix"; else echo "clearfix error" ?>">
		<label for="informal_skill">Keahlian informal:  </label>
		<div class="input">
		<?php 
			$data = array(
						'name' => 'informal_skill',
						'value' => set_value('informal_skill'),
						'class' => 'xlarge'
					);
		echo form_input($data); ?>
		<span class="help-inline"><?php echo form_error('informal_skill'); ?></span>
		</div>
	</div>
	<div class="actions">
          <button type="submit" class="btn primary">Bikin akun</button>&nbsp; <a href="/login" class="btn">Login</a>
    </div>

	<?php echo form_close(); ?>
</div>