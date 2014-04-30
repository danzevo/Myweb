<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Myweb</title>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<link rel='stylesheet' href='<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css'>
		<style>
			.top {
				margin-top: 2%;
			}
		</style>
		<script type='text/javascript' src='<?php echo base_url() ?>asset/jquery-1.11.0.min.js'></script>
		<script type='text/javascript' src='<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js'></script>
		
		<script type='text/javascript'>
		 var site_url = '<?php echo site_url() ?>/';
		 </script>
	</head>
	<body>
		<?php echo $this->load->view('header.php') ?>
		
		<?php echo $this->load->view($view) ?>
	</body>
</html>