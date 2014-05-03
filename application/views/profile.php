<script type='text/javascript'>
	$.fn.ready( function() {
		// clear();
	});
	
	function update() {
		// validate('nama');
		// validate('username');
		// validate('password');
		// validate('email');
		// var foto = $('#foto').get(0);
		
		// $.post(site_url+'home/update_profile',
				// {foto : foto.files[0]},
				// function(result) {
					// $('#contData').html(result);
					// alert(result);
				// }
			// );
	}
	
	function clear() {
		// $('#nama').val('');
		// $('#email').val('');
		$('#alamat').val('');
		$('#kota').val('');
		$('#foto').val('');
	}
	
	function readUrl(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			var img = new Image();
		
			reader.onload = function (e) {
					img.src = e.target.result;
					img.onload = function() {
							if(this.width > 192 || this.height > 192) {
								alert('Foto Ukuran maksimum 192x192');
								$('#foto').val('');
							}	
							else {
								$('#preview').prop('src', e.target.result);
							}	
						}	
				};
			
			reader.readAsDataURL(input.files[0]);
			
		}
	}
</script>
<div id='contData'>
	<div class='container'>
		<form id='updateProfile' class='form-horizontal' role='form' method='post' action='<?php echo site_url('home/update_profile') ?>' enctype='multipart/form-data'>
			<div class='form-group'>
				<div class='col-xs-offset-3 col-xs-5'>
					<div class='page-header'>
						<h1><?php echo $title ?></h1>
					</div>	
				</div>	
			</div>
			<div class='form-group'>
				<label for='foto' class='col-xs-3 control-label'>Foto Profil</label>
				<div class='col-xs-2'>
					<div class='thumbnail'>
						<img id='preview' src='<?php 
												if($user['IMAGE']) {
													echo base_url().$user['IMAGE'];
												}else { 
													echo base_url() ?>asset/img/no-image.png
												<?php } ?>' class='img-thumbnail img-responsive' alt='Foto Profil'>
					</div>
				</div>
			</div>
			<div class='form-group'>
				<label for='file' class='col-xs-3 control-label'></label>
				<div class='col-xs-2'>
					<input type='file' id='foto' name='foto' onchange='readUrl(this)'>
				</div>
			</div>
			<div class='form-group'>
				<label for='nama' class='col-xs-3 control-label'>Nama</label>
				<div class='col-xs-3' id='group_nama'>
					<input type='hidden' name='id_user' id='id_user' value='<?php echo $user['ID_USER'] ?>'>
					<input type='text' class='form-control' name='nama' id='nama' placeholder='Input Nama' value='<?php echo $user['NAMA'] ?>'>
					<div id='val_nama'></div>
				</div>	
			</div>
			<div class='form-group'>
				<label for='email' class='col-xs-3 control-label'>Email</label>
				<div class='col-xs-3' id='group_email'>
					<input type='email' class='form-control' name='email' id='email' placeholder='Input Email' value='<?php echo $user['EMAIL'] ?>'>
					<div id='val_email'></div>
				</div>	
			</div>
			<div class='form-group'>
				<label for='alamat' class='col-xs-3 control-label'>Alamat</label>
				<div class='col-xs-3' id='group_alamat'>
					<textarea class='form-control' name='alamat' id='alamat' placeholder='Input Alamat' rows='3'><?php echo $user['ALAMAT'] ?></textarea>
					<div id='val_alamat'></div>
				</div>	
			</div>
			<div class='form-group'>
				<label for='kota' class='col-xs-3 control-label'>Kota</label>
				<div class='col-xs-2' id='group_kota'>
					<input type='text' class='form-control' name='kota' id='kota' placeholder='Input Kota' value='<?php echo $user['KOTA'] ?>'>
					<div id='val_kota'></div>
				</div>	
			</div>
			<div class='form-group'>
				<div class='col-xs-offset-3 col-xs-1'>
					<button type='submit' class='btn btn-primary' onclick='update()'>Update</button>
				</div>
				<div class='col-xs-1'>
					<button type='reset' class='btn'>Reset</button>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-xs-offset-3 col-xs-6'>
					<div class="alert alert-danger <?php echo ($msg ? '' : 'hide') ?>">
						<?php echo ($msg ? $msg : '') ?><br>
						<?php echo ($error ? $error : '') ?>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>