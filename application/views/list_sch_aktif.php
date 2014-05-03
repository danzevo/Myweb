<div class='table-responsive'>
	<table class='table table-striped table-bordered table-hover'>
		<thead>
			<tr>
				<th class='text-center' style='width:5%'>No</th>
				<th class='text-center'>Nama</th>
				<th class='text-center'>Username</th>
				<th class='text-center'>Email</th>
				<th class='text-center'>Level User</th>
				<th class='text-center'>Login</th>
				<th class='text-center'>Tambah Artikel</th>
				<th class='text-center'>Ubah Artikel</th>
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
				<td class='text-center'><?php echo $row->NAMA ?></td>
				<td class='text-center'><?php echo $row->USERNAME ?></td>
				<td class='text-center'><?php echo $row->EMAIL ?></td>											
				<td class='text-center'><?php echo ($row->LEVEL_USER == 1 ? 'Admin' : 'Penulis') ?></td>											
				<td class='text-center'><?php echo $row->NUM_LOGIN ?></td>											
				<td class='text-center'><?php echo $row->NUM_TAMBAH_ART ?></td>											
				<td class='text-center'><?php echo $row->NUM_EDIT_ART ?></td>											
			<?php 	
				}
			} ?>
		</tbody>
	</table>
</div>