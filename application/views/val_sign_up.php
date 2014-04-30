<div class='wrapper-val'>
	<div class='row' style='margin-top:5%;margin-bottom:5%;margin-left:8%'>
		<div class='col-xs-12'>
			<form id='signUpForm' class='form-horizontal' role='form'>
				<div class='form-group'>
					<div class='col-xs-10'>
						<?php if($par == 'verifikasi') { ?>
							<p class='form-control-static text-success'>Selamat Anda Telah Terdaftar, Aktifkan Akun Anda melalui Link Yang Kami Beri Melalui Email Anda</p>
						<?php }else { ?>
							<p class='form-control-static text-success'>Selamat Akun Anda Telah Aktif, Klik <a href='javascript:void(0)' onclick='form_login()'>Login</a> Untuk Masuk</p>
						<?php } ?>
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>