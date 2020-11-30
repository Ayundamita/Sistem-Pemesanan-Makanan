<?php
ob_start();
	if (ISSET($_POST['submit'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$password = md5($pass);

		include 'config.php';
		$sql = "SELECT * FROM penjual WHERE username = '$username' and password = '$password'";
		$result = mysqli_query($connect, $sql);
		$dataadmin = mysqli_fetch_array($result);
		
		// $id = md5($datapenjual['id_penjual']);
		$id = $dataadmin['id_penjual'];

		if ($dataadmin){
		header("Location: admin.php?id=$id");
		};

		if(!$dataadmin){
		?>
		<script type="text/javascript">
			alert("Username atau Password salah!");
		</script>
		<?php
		};
	};
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Authentication</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="
	padding: 0px;
	margin: 0px;
	font-family: 'serif';
">
<main>
	<section style="
			width: 100%;
			height: 100vh;
			padding: 0px;
			margin: 0px; 
			background-image: url(img/bg.jpg);
		">

		<div style="width: 80%; 
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="auth.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">LOGIN ADMIN</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<label for="fusername">Username</label></br>
						<input type="text" name="username" placeholder="Nama Lengkap" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 85%;
						">
					</li>
					<li style="">
						<label for="fusername">Password</label></br>
						<input type="password" name="pass" placeholder="Password" style="
							outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							background-color: #f9f9f9;
							padding: 10px 15px 10px 15px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 85%;
						">
					</li>
				</ul>
				<button type="submit" name="submit" class="btn btn-primary" style="
					outline: none;
							border: none;
							border-radius: 10px;
							font-size: 17px;
							padding:5px 10px 5px 10px;
							margin-top: 5px;
							margin-bottom: 10px;
							width: 30vh;
							margin-left: 15vh;
							margin-right: 15vh;
							cursor: pointer;
				">Login</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>