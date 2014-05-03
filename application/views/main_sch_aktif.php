<script type='text/javascript'>
	$.fn.ready(function() {
		pageLoad(1);
	});
	
	function pageLoad(page) {
		$.post(site_url+'home/page_sch_aktif/'+page,
				{},
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
			<form class='form-inline' role='form'>
				<div class='form-group'>
					<label>Cari Berdasarkan : </label>	
					<div class='btn-group'>
						<button type='button' class='btn btn-default'>Login</button>
						<button type='button' class='btn btn-default'>Tambah Artikel</button>
						<button type='button' class='btn btn-default'>Ubah Artikel</button>
					</div>
				</div>
				<div class='pull-right'>
					<!--button type='button' class='btn btn-primary'>Cari</button-->
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