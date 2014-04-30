<script type='text/javascript'>
	$.fn.ready(function() {
		pageLoad(1);
	});
	
	function pageLoad(page) {
		$.post(site_url+'home/page/'+page,
				{},
				function(result) {
					$('#contData').html(result);
				}
			);
	}
	
	function addData() {
		window.location = 'home/input';
	}
	
	function editData(id) {
		window.location = 'home/input/'+id;
	}
	
	function viewData(id) {
		window.location = 'home/view_data/'+id;
	}
	
	function delData(id, judul) {
		var z = confirm('Apa Anda Ingin Menghapus '+judul+' ?');
		
		if(z) {
			$.post(site_url+'home/delete/'+id,
					{},
					function(result) {
						alert(result.message);
						pageLoad(1);
					},
					'json'
				);
		}	
	}
</script>
<div class='container'>
	<h1><?php echo $title ?></h1>
	<div class='row top'>
		<div class='col-xs-12'>
			<button type='button' class='btn btn-primary' onclick='addData()'>Baru</button>
		</div>
	</div>
	<div class='row top'>
		<div id='contData' class='col-xs-10'>
		</div>
	</div>
</div>