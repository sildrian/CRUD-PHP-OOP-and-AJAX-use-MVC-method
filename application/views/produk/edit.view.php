
<h2 class="page-header">Edit Produk</h2>

<?php
$data = $data[0];
//var_dump($data);
//menapilkan pesan error jika ada
if(isset($data['msg'])){
?>

<div class="alert alert-danger">
	<ul>
		<?php
			foreach ($data['msg'] as $error) {
				# code...
				echo '<li>$error</li>';
			}
		?>
	</ul>
</div>
<?php
		$data = $data['data'];

	}
	
	//$data = $data[0];
	//var_dump($data);
?>

<form class="form-horizontal" method="post" action="<?= BASE_PATH ?>/produk/update">

<input type="hidden" name="id" value="<?= $data['id_produk'] ?>">


	<div class="form-group">
		<label class="control-label col-md-2">Nama Produk</label>
			<div class="col-md-4">
				<input type="text" name="nama" class="form-control" value="<?= $data['nama_produk'] ?>"></input>
			</div>
	</div>

	<div class="form-group">
		<label class="control-label col-md-2">Harga</label>
			<div class="col-md-4">
				<input type="number" name="harga" class="form-control" value="<?= $data['harga'] ?>">
			</div>
	</div>

	<button class="btn btn-primary col-md-offset-2">Edit</button>
	<a class="btn btn-warning" href="<?= BASE_PATH ?>/produk">Batal</a>

</form>