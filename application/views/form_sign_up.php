<script type='text/javascript'>
	$.fn.ready( function() {
		clear();
	});
	
	function save() {
		// validate('nama');
		// validate('username');
		// validate('password');
		// validate('email');
		
		$.post(site_url+'login/sign_up_add',
				$('#signUpForm').serialize(),
				function(result) {
					$('#contData').html(result);
				}
			);
	}
	
	function clear() {
		$('#nama').val('');
		$('#username').val('');
		$('#password').val('');
		$('#email').val('');
		$('#alamat').val('');
		$('#kota').val('');
	}
</script>
<div id='contData'>
	<div class='wrapper-signup'>
		<div class='row' style='margin-top:0%;margin-left:6%'>
			<div class='col-xs-12'>
				<form id='signUpForm' class='form-horizontal' role='form'>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-5'>
							<h1>Sign Up</h1>
						</div>	
					</div>
					<div class='form-group'>
						<label for='nama' class='col-xs-3 control-label'>Nama</label>
						<div class='col-xs-6' id='group_nama'>
							<input type='text' class='form-control' name='nama' id='nama' placeholder='Input Nama'>
							<div id='val_nama'></div>
						</div>	
					</div>
					<div class='form-group'>
						<label for='username' class='col-xs-3 control-label'>Username</label>
						<div class='col-xs-6' id='group_username'>
							<input type='text' class='form-control' name='username' id='username' placeholder='Input Username'>
							<div id='val_username'></div>
						</div>	
					</div>	
					<div class='form-group'>
						<label for='password' class='col-xs-3 control-label'>Password</label>
						<div class='col-xs-6' id='group_password'>
							<input type='password' class='form-control' name='password' id='password' placeholder='Input Password'>
							<div id='val_password'></div>
						</div>	
					</div>	
					<div class='form-group'>
						<label for='email' class='col-xs-3 control-label'>Email</label>
						<div class='col-xs-6' id='group_email'>
							<input type='email' class='form-control' name='email' id='email' placeholder='Input Email'>
							<div id='val_email'></div>
						</div>	
					</div>
					<div class='form-group'>
						<label for='alamat' class='col-xs-3 control-label'>Alamat</label>
						<div class='col-xs-8' id='group_alamat'>
							<textarea class='form-control' name='alamat' id='alamat' placeholder='Input Alamat' rows='3'></textarea>
							<div id='val_alamat'></div>
						</div>	
					</div>
					<div class='form-group'>
						<label for='kota' class='col-xs-3 control-label'>Kota</label>
						<div class='col-xs-6' id='group_kota'>
							<input type='text' class='form-control' name='kota' id='kota' placeholder='Input Kota'>
							<div id='val_kota'></div>
						</div>	
					</div>
					<div class='form-group'>
						<label for='level_user' class='col-xs-3 control-label'>Level User</label>
						<div class='col-xs-6'>
							<select class='form-control' name='level_user' id='level_user'>
								<option value='1'>Admin</option>
								<option value='2'>Penulis</option>
							</select>	
						</div>	
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-2'>
							<button type='button' class='btn btn-primary' onclick='save()'>Daftar</button>
						</div>
						<div class='col-xs-2'>
							<button type='reset' class='btn'>Reset</button>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-6'>
							<div class="alert alert-danger <?php echo ($msg ? '' : 'hide') ?>">
								<?php echo ($msg ? $msg : '') ?>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>