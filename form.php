<?php include_once 'include/header.php';?>

<?php 
	
	$judul='';
	$tgl='';
	$blog='';

	if (isset($_GET['aksi'])) {  /*if jika isset(diidsi) dan mendapat aksi maka */

			if (isset($_GET['id'])){
				$id=$_GET['id'];

			}

			$aksi=$_GET['aksi'];

			if ($aksi == 'delete') {
				$sql=" DELETE FROM post WHERE id = $id";
				$query=mysqli_query($koneksi,$sql);
				header('location: blog.php');
			}elseif ($aksi=='edit') {
				$sql="SELECT * FROM post WHERE id = $id";/*memilih tabel untuk di edit*/
				$query=mysqli_query($koneksi,$sql);
				while ($result= mysqli_fetch_assoc($query)) {
					$judul=$result['judul'];
					$tgl=$result['tgl'];
					$blog=$result['blog'];
					# code...
				}
				# code...
			}

			if(isset($_POST['submit'])) {/*JIKA BLOG DI submit maka */
				$judul=$_POST['judul'];
				$tgl=$_POST['tgl'];
				$blog=$_POST['blog'];
				$author=$_SESSION['username'];

				if($aksi=='tambah'){/*jika aksi = ditambah maka*/
					$tgl = date('d-m-Y');/*y besar agar bissa 4 digit*/
					$sql="INSERT INTO post(judul,blog,tgl,author)
							VALUES('$judul','$blog','$tgl','$author')";
							
							
				}elseif($aksi=='edit'){/*jika aksi= edit maka*/
					$sql="UPDATE post SET judul='$judul',tgl='$tgl',blog='$blog',author='$author'
							WHERE id=$id";
					# code...
				}

				mysqli_query($koneksi,$sql);
				header('location:blog.php');

				}
				# code...
		
				# code...
		
		
	}
 ?>


<div class="blog">
	<form method="post" class="form">
		<label>Judul</label>
		<input type="text" name="judul" value="<?=$judul ?>">
		<label>Tanggal</label>
		<input type="text" name="tgl" value="<?=$tgl ?>">
		<label>Blog</label>
		<textarea name="blog"><?=$blog ?></textarea>
		<input type="submit" name="submit" value="Submit">
	</form>
</div>
<?php include_once "include/footer.php";?>