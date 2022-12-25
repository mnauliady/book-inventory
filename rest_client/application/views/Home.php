<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container-fluid">
		<div class="row" style="padding-top:40px;padding-left:10px;padding-right:10px;">
		<br>
		<br>
		<a href="<?php echo site_url('Buku/tambah_buku'); ?>"><button class="btn btn-primary" type="button">Tambah Buku</button></a>
	<table  class="table table-hover" >
		<thead class="table-primary">
			<tr >
				<th scope="col">No</th>
				<th scope="col">Judul Buku</th>
				<th scope="col">Pengarang</th>
				<th scope="col">Penerbit</th>
				<th scope="col">Kategori</th>
				<th scope="col">Aksi</th>
			</tr>
		</thead>
				<?php $i=1;
						foreach($databuku as $key){ ?>
							<tbody>
								<tr class="table-dafault">
									<th scope="row"><?php echo $i ?></th>
									<td><?php echo $key->judul ?></td>
									<td><?php echo $key->pengarang ?></td>
									<td><?php echo $key->penerbit ?></td>
									<td><?php echo $key->kategori ?></td>

									<td>
									<a href="<?php echo site_url('Main/detail?id_buku='.$key->id_buku); ?>"><button class="btn btn-primary" type="button">Detail</button></a></td>

								</tr>
							</tbody>
				<?php  $i++; } ?>
				</table>
			</div>
		</div>
