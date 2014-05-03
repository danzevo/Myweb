<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Myweb</title>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css'>
		<link rel='stylesheet' href='<?php echo base_url() ?>asset/css/jquery-ui-1.10.4.custom.min.css'>
		<style>
			html, body{
				height:85%;
				width:auto;	
				background:#f6f6f6;
			}
			
			.wrapper-login {
				background:#ffffff;
				height:70%;
				width:35%;
				margin:auto;
				border:1px solid #6E7290;
				margin-top:10%;
				-webkit-border-top-left-radius:15px;
				-moz-border-radius-topleft:15px;
				border-top-left-radius:15px;
				-webkit-border-top-right-radius:15px;
				-moz-border-radius-topright:15px;
				border-top-right-radius:15px;
				-webkit-border-bottom-right-radius:15px;
				-moz-border-radius-bottomright:15px;
				border-bottom-right-radius:15px;
				-webkit-border-bottom-left-radius:15px;
				-moz-border-radius-bottomleft:15px;
				border-bottom-left-radius:15px;
				-moz-box-shadow:3px 3px 2px 2px #bbdaf7;
				-webkit-box-shadow:3px 2px 3px 2px #bbdaf7;
				box-shadow:3px 3px 2px 2px #bbdaf7;
			}
			
			.wrapper-signup {
				background:#ffffff;
				height:150%;
				width:40%;
				margin:auto;
				border:1px solid #6E7290;
				margin-top:0.5%;
				-webkit-border-top-left-radius:15px;
				-moz-border-radius-topleft:15px;
				border-top-left-radius:15px;
				-webkit-border-top-right-radius:15px;
				-moz-border-radius-topright:15px;
				border-top-right-radius:15px;
				-webkit-border-bottom-right-radius:15px;
				-moz-border-radius-bottomright:15px;
				border-bottom-right-radius:15px;
				-webkit-border-bottom-left-radius:15px;
				-moz-border-radius-bottomleft:15px;
				border-bottom-left-radius:15px;
				-moz-box-shadow:3px 3px 2px 2px #bbdaf7;
				-webkit-box-shadow:3px 2px 3px 2px #bbdaf7;
				box-shadow:3px 3px 2px 2px #bbdaf7;
			}
			
			.wrapper-val {
				background:#ffffff;
				height:auto;
				width:40%;
				margin:auto;
				border:1px solid #6E7290;
				margin-top:0.5%;
				margin-top:12%;
				-webkit-border-top-left-radius:15px;
				-moz-border-radius-topleft:15px;
				border-top-left-radius:15px;
				-webkit-border-top-right-radius:15px;
				-moz-border-radius-topright:15px;
				border-top-right-radius:15px;
				-webkit-border-bottom-right-radius:15px;
				-moz-border-radius-bottomright:15px;
				border-bottom-right-radius:15px;
				-webkit-border-bottom-left-radius:15px;
				-moz-border-radius-bottomleft:15px;
				border-bottom-left-radius:15px;
				-moz-box-shadow:3px 3px 2px 2px #bbdaf7;
				-webkit-box-shadow:3px 2px 3px 2px #bbdaf7;
				box-shadow:3px 3px 2px 2px #bbdaf7;
			}
		</style>
		<script type='text/javascript' src='<?php echo base_url() ?>asset/js/jquery-1.11.0.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url() ?>asset/js/jquery-ui-1.10.4.custom.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js'></script>
		
		<script type='text/javascript'>
		 var site_url = '<?php echo site_url() ?>/';
		 
		 function login() {
			// var username = $('#username').val();
			// var password = $('#password').val();
			
			// alert($('#val_username').html());
			// if(username=='')
			// validate('username');
			
			// if(password=='')
			// validate('password');
				
			$.post(site_url+'login/do_login',
					$('#login').serialize(),
					function(result) {
						if(result == 'berhasil')
							window.location = site_url + 'home';
						else
							$('#contData').html(result);
					},
					'html'
				);
		 }
		 
		 function validate(obj) {
			if($('#'+obj).val() == '')
			{
				$('#val_'+obj).html("<label for='"+obj+"' class='text-danger'>this field required</label>");
				$('#group_'+obj).addClass('has-error');
				return false;
			}
		 }
		 
		 function sign_up() {
			window.location = site_url + 'login/sign_up';
		 }
		 
		 function forgot_password() {
			window.location = site_url + 'login/forgot_password';
		 }
		 
		  function form_login() {
			window.location = site_url + 'login';
		 }
		 </script>
	</head>
	<body>
		<?php echo $this->load->view($view) ?>
	</body>
</html>	