<?php
	require "lib/dbCon.php";
	session_start();
	ob_start();
?>

<?php 
	if( isset($_SESSION["User"]) ){
		header('Location: ../main.php');
	}
?>

<!DOCTYPE>
<html>
<head>
	<title>Laugh Lâm blogspot</title>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/login.css"/>
	<link rel="stylesheet" href="css/index.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_login.css"/>
	<link href="https://fonts.googleapis.com/css?family=Montserrat|PT+Sans+Caption|Raleway|Source+Sans+Pro" rel="stylesheet">
</head>
<body>
	<div id="wrapperIndex">
		<div id="link">
			<a id="about" class="link linkCss" href="/">About</a>
			<a id="blog" class="link linkCss" href="blog">Blog</a>
			<a id="contact" class="link linkCss" href="contact">Contact</a>
			<a id="login1" class="link linkCss" style="border-bottom: 2px solid white;" href="login">Login</a>
		</div>
	<div id="responeAhref">
		<div id="bgindex">
			<img id="backgroundFull" width="100%" height="100%" src="img/background11.png">
			<img id="backgroundMobile" width="100%" height="100%" src="img/background111.png">
		</div>
		<div id="wrapperlogin">
			<div id="layoutlogin">
				<div id="login">
					<form action="#" method="POST">
						<h1>Welcome to IOT</h1>
						<div class="nametkmk">Username</div>
						<input class="tkmk" type="text" name="txtUsr" value="<?php if(isset($_COOKIE['userck'])) echo $_COOKIE['userck']; ?>" size="" /><br/>
						<div class="nametkmk">Password</div>
						<input class="tkmk" type="Password" name="txtPwd" value="<?php if(isset($_COOKIE['passck'])) echo $_COOKIE['passck']; ?>" size="" /><br/>
						<div id="rememberID">
							<input type="checkbox" name="cbRmbID" <?php if(isset($_COOKIE['userck'])) echo "checked"; ?>/>
							<label> Remember me</label>
						</div>
						<div id="signupbtn"><label>Not a member? </label><a href="signup.php"><b>Sign up now</b></a></div><br/>
						<div id="replytkmk"><b>
							<?php
								if( isset($_POST["btnDangnhap"])){
									$Usr = $_POST["txtUsr"];
									$Pwd = $_POST["txtPwd"];
									$qr = "
										SELECT * FROM users 
										WHERE User = '$Usr'
										AND Password = '$Pwd'
									";
									$qrUser = mysqli_query($conn, $qr);
									if( mysqli_num_rows($qrUser) == 1 ){
										//echo "Đăng nhập thành công";
										$row = mysqli_fetch_array($qrUser);
										$_SESSION["User"] = $row['User'];
										if( isset($_POST["cbRmbID"]) ){
											setcookie('userck',$Usr,time()+3600,'/','',0,0);
											setcookie('passck',$Pwd,time()+3600,'/','',0,0);
										}
										else if( !isset($_POST["cbRmbID"]) ){
											unset($_COOKIE['userck']);
											unset($_COOKIE['passck']);
											setcookie('userck', null, -1, '/');
											setcookie('passck', null, -1, '/');
										}
										header("Location: /main.php");
										exit();
									}
									else{
										echo "Please check again username and password";
									}
								}
							?>
						</div></b>
						<div id="loginbtn1"><input id="loginbtn" type="submit" name="btnDangnhap" value="Đăng nhập" /></div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
