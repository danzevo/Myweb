<script type='text/javascript'>
	$.fn.ready(function() {
		pageLoad();
		
		$('#sch_tgl_dari').val('');
		$('#sch_tgl_ke').val('');
		
		$('#sch_tgl_dari').datepicker({
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true,
			dateFormat: 'dd-mm-yy'
		});
		
		$('#sch_tgl_ke').datepicker({
			changeMonth: true,
			changeYear: true,
			showOtherMonths: true,
			selectOtherMonths: true,
			dateFormat: 'dd-mm-yy'
		});
	});
	
	function pageLoad() {
		$.post(site_url+'home/page_sch_tgl/',
				$('#schTglForm').serialize(),
				function(result) {
					$('#contData').html(result);
				}
			);
	}
</script>
<div class='container'>
	<div class='col-xs-10'>
		<div class='page-header'>
			<h1><?php echo $title ?></h1>
		</div>
	</div>
	<div class='row top'>
		<div class='col-xs-12'>	
			<form id='schTglForm' class='form-inline' role='form'>
				<div class='form-group'>
					<label for='sch_tgl_dari'>Dari Tanggal</label>&nbsp;
					<input type='text' id='sch_tgl_dari' name='sch_tgl_dari' class='form-control'>
				</div>&nbsp;&nbsp;
				<div class='form-group'>
					<label for='sch_tgl_ke'>Sampai Tanggal</label>&nbsp;
					<input type='text' id='sch_tgl_ke' name='sch_tgl_ke' class='form-control'>
				</div>
				<button type='button' class='btn btn-default' onclick='pageLoad()'>Cari</button>
				<div class='pull-right'>
					<button type='button' class='btn btn-success'>Cetak</button>
				</div>	
			</form>	
		</div>
	</div>
	<div class='row top'>
		<div id='contData' class='col-xs-12'>
		</div>
	</div>
</div>