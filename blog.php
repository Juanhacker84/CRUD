<?php include_once 'include/header.php'; ?>

<div class="blog">

	<?php if(isset($_SESSION['username'])){ ?>
	<a class="tombol tambah" href="form.php?aksi=tambah">Tambah blog</a>
	<?php } ?>

	<?php 
		$sql="SELECT * FROM post";
		$query= mysqli_query($koneksi,$sql);
		while ($result = mysqli_fetch_assoc($query)){
			# code...
		
	 ?>
	<div class="post">
		<h1><?= $result['judul']?></h1>
		<i class="tgl"><?= $result['tgl']?></i>
		<hr>
		<p class="isi"><?= $result['blog']?></p>

		<?php if (isset($_SESSION['username'])) {
				if($_SESSION['username'] == $result['author']) { ?>
		<a class="tombol edit" href="form.php?aksi=edit&id=<?=$result['id']?>">Edit</a>
		<a class="tombol delete" href="form.php?aksi=delete&id=<?=$result['id']?>">Hapus</a>
		<?php }} ?>
	</div>
<?php }?>
</div>

<?php include_once 'include/footer.php'; ?>

