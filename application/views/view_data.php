<div class='container'>	
	<div class='col-xs-10'>
		<div class='page-header'>
			<h1><?php echo $title ?></h1>
		</div>
	</div>
	<form id='inputArtikel' role='form'>
		<div class='row top'>
			<div id='msgJudul' class='col-xs-3'>
				<label for='judul'>Judul Artikel</label>
				<p class='form-control-static'><?php echo (isset($art['JUDUL']) ? $art['JUDUL'] : '') ?></p>
			</div>
		</div>
		<div class='row top'>
			<div class='col-xs-4'>
				<label for='isi'>Isi Artikel</label>
				<p class='form-control-static'><?php echo (isset($art['ISI']) ? $art['ISI'] : '') ?></p>
			</div>
		</div>
	</form>
</div>