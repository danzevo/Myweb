<div id='contData'>
	<div class='wrapper-login'>
		<div class='row' style='margin-top:0%;margin-left:18%'>
			<div class='col-xs-8'>
				<form id='login' class='form-horizontal' role='form'>
					<div class='form-group'>
						<p><em><h3>Welcome To Myweb</h3></em></button>
					</div>
					<div class='form-group'>
						<label for='username' class='col-xs-4 control-label'>Username</label>
						<div class='col-xs-8' id='group_username'>
							<input type='text' class='form-control' name='username' id='username' placeholder='Input Username'>
							<div id='val_username'></div>
						</div>	
					</div>		
					<div class='form-group'>
						<label for='password' class='col-xs-4 control-label'>Password</label>
						<div class='col-xs-8' id='group_password'>
							<input type='password' class='form-control' name='password' id='password' placeholder='Input Password'>
							<div id='val_password'></div>
						</div>	
					</div>
					<div class='form-group'>
						<div class='col-xs-12'>
							<div class="alert alert-danger <?php echo ($msg ? '' : 'hide') ?>">
								<?php echo ($msg ? $msg : '') ?>
							</div>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-2 col-xs-12'>
							<button type='button' class='btn btn-link' onclick='forgot_password()'><u><em>Forgot Password</em></u></button>
						</div>
					</div>
					<div class='form-group'>
						<div class='col-xs-offset-2 col-xs-3'>
							<button type='button' class='btn btn-primary' onclick='login()'>Login</button>
						</div>
						<div class='col-xs-3'>
							<button type='button' class='btn btn-success' onclick='sign_up()'>Sign Up</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>	
</div>	