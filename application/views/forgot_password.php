<script type='text/javascript'>
	function val_forgot_password() {
		$.post(site_url+'login/val_forgot_password',
				{email : $('#email').val()},
				function(result) {
					$('#contData').html(result);
				}
			);
	}
</script>
<div id='contData'>
	<div class='wrapper-val'>
		<div class='row' style='margin-top:0%;margin-left:5%'>
			<div class='col-xs-12'>
				<form id='forgotPasswordForm' class='form-horizontal' role='form'>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-5'>
							<h3>Forgot Password</h3>
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
						<div class='col-xs-offset-3 col-xs-7'>
							<?php if(!$msg) { ?>
								<p class='form-control-static'>Kami Akan Mengirim Password melalui Akun Email Anda</p>
							<?php } else { ?>
								<div class="alert alert-danger">
									<?php echo $msg ?>
								</div>
							<?php } ?>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-3 col-xs-2' style='margin-top:2%'>
							<button type='button' class='btn btn-primary' onclick='val_forgot_password()'>Kirim</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>	