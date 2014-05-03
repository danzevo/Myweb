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
			
			.dropdown-submenu {
				position:relative;
				}
			.dropdown-submenu>.dropdown-menu{
				top:0;
				left:100%;
				margin-top:-6px;
				margin-left:-1px;
				-webkit-border-radius:0 6px 6px 6px;
				-moz-border-radius:0 6px 6px 6px;
				border-radius:0 6px 6px 6px;
				}
			.dropdown-submenu:hover>.dropdown-menu{
				display:block;
				}
			.dropdown-submenu>a:after{
				display:block;
				content:" ";
				float:right;
				width:0;
				height:0;
				border-color:transparent;
				border-style:solid;
				border-width:5px 0 5px 5px;
				border-left-color:#cccccc;
				margin-top:5px;
				margin-right:-10px;
				}
			.dropdown-submenu:hover>a:after{
				border-left-color:#ffffff;
			}
			.dropdown-submenu.pull-left{
				float:none;
			}
			.dropdown-submenu.pull-left>.dropdown-menu{
				left:-100%;
				margin-left:10px;
				-webkit-border-radius:6px 0 6px 6px;
				-moz-border-radius:6px 0 6px 6px;
				border-radius:6px 0 6px 6px;
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