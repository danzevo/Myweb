<script type='text/javascript'>
	function saveData() {
		$.post(site_url+'home/save',
				$('#inputArtikel').serialize(),
				function(result)
				{
					if(result.val_error)
					{
						$('#msgJudul').prop('class', 'col-xs-3 has-warning');
						$('#judul').prop('placeholder', result.val_error);
					}else
					{
						alert(result.message);
						clear();
						window.location = site_url + 'home';
					}
				},
				'json'
			);
			
	function clear() {
		$('#judul').val('');
		$('#isi').val('');
	}
	
	}	
</script>
<div class='container'>
	<h1><?php echo $title ?></h1>
	<form id='inputArtikel' role='form'>
		<div class='row top'>
			<div id='msgJudul' class='col-xs-3'>
				<label for='judul'>Judul Artikel</label>
				<input type='hidden' id='id_artikel' name='id_artikel' value='<?php echo (isset($art['ID_ARTIKEL']) ? $art['ID_ARTIKEL'] : '') ?>'>
				<input type='text' id='judul' name='judul' class='form-control' value='<?php echo (isset($art['JUDUL']) ? $art['JUDUL'] : '') ?>' placeholder='Tulis Judul Artikel'>
			</div>
		</div>
		<div class='row top'>
			<div class='col-xs-4'>
				<label for='isi'>Isi Artikel</label>
				<textarea id='isi' name='isi' class='form-control' rows='5' placeholder='Tulis Isi Artikel'><?php echo (isset($art['ISI']) ? $art['ISI'] : '') ?></textarea>
			</div>
		</div>
		<div class='row top'>
			<div class='col-xs-1'>
				<button type='button' id='judul' name='judul' onclick='saveData()' class='btn btn-primary'>Simpan</button>
			</div>
			<div class='col-xs-3'>
				<button type='reset' class='btn'>Reset</button>
			</div>
		</div>
	</form>
</div>