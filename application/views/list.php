<div class='table-responsive'>
	<table class='table table-striped table-bordered table-hover'>
		<thead>
			<tr>
				<th class='text-center' style='width:5%'>No</th>
				<th class='text-center'>Judul</th>
				<th class='text-center'>Tanggal Artikel</th>
				<th class='text-center'>User</th>
				<th class='text-center' style='width:8%'>*</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no = 1;
				if($list->num_rows() > 0) {
				foreach($list->result() as $row) {
				?>
			<tr>
				<td><?php echo $no++ ?></td>
				<td class='text-center'><?php echo $row->JUDUL ?></td>
				<td class='text-center'><?php echo date('d-m-Y', strtotime($row->TGL_ARTIKEL)) ?></td>
				<td class='text-center'><?php echo $row->USERNAME ?></td>				
				<td>
					<a href='javascript:void(0)' title='Ubah Data' onclick='editData(<?php echo $row->ID_ARTIKEL ?>)'>
						<i class='glyphicon glyphicon-edit'></i>
					</a>
					<a href='javascript:void(0)' title='Hapus Data' onclick="delData(<?php echo $row->ID_ARTIKEL ?>, '<?php echo $row->JUDUL ?>')">
						<i class='glyphicon glyphicon-trash'></i>
					</a>
					<?php if(trim($this->session->userdata('id_user')) == $row->ID_USER) { ?>
					<a href='javascript:void(0)' title='Preview Data' onclick='viewData(<?php echo $row->ID_ARTIKEL ?>)'>
						<i class='glyphicon glyphicon-search'></i>
					</a>
					<?php } ?>
				</td>				
			<?php 	
				}
			} ?>
		</tbody>
	</table>
</div>