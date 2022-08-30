<?php include_once "include/header.php"?>

<?php 
	
	if(isset($_POST['login'])){
		$username=$_POST['username'];
		$password=$_POST['password'];

		$sql= "SELECT * FROM user WHERE username= '$username' AND password='$password'";

		$query= mysqli_query($koneksi,$sql);
		$result= mysqli_num_rows($query);

		if($result > 0){
			$_SESSION['username']= $username;
			header('location:index.php');
		}else{
			echo "username atau password salah";
		}
	}
 ?>
		<div class="login">
			<h2>Login</h2>
			<form method="post">
				<input type="text" name="username" placeholder="username">
				<input type="password" name="password" placeholder="password">
				<input type="submit" name="login" value="Login">
			</form>
		</div>
		<h1>haikk haikk desuu</h1>
<?php include_once "include/footer.php"?>
