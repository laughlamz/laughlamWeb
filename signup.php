<?php
	require "lib/dbCon.php";
	ob_start();
?>

<!DOCTYPE>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
	<link rel="shortcut icon" href="img/favicon1.png"> 
	<link rel="stylesheet" href="css/normalize.css"/> <!-- Reset CSS -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/signup.css"/>
	<link rel="stylesheet" type="text/css" href="css/responsive_signup.css"/>
</head>
<body>
	<div id="bgindex">
		<img id="backgroundFull" width="100%" height="100%" src="img/background11.png">
		<img id="backgroundMobile" width="100%" height="100%" src="img/background111.png">
	</div>
	<div id="wrapperlogin">
		<div id="layoutlogin">
			<div id="login">
				<form action="#" method="POST">
					<h1>Sign up</h1>
					<div class="nametkmk">Username</div>
					<input class="tkmk" type="text" name="txtsUsr" value="" size="30" />
					<div class="nametkmk">Password</div>
					<input class="tkmk" type="Password" name="txtsPwd" value="" size="30" />
					<div class="nametkmk">Re-Password</div>
					<input class="tkmk" type="Password" name="txtsRePwd" value="" size="30" />
					<div class="nametkmk">Email</div>
					<input class="tkmk" type="text" name="txtsEmail" value="" size="30" />
					<div id="replytkmk"><b>
						<?php
							if(isset($_POST["btnDangky"])){
								$username = $_POST["txtsUsr"];
								$password = $_POST["txtsPwd"];
								$repassword = $_POST["txtsRePwd"];
								$email = $_POST["txtsEmail"];
								if($password == $repassword){
									$qr = "
										SELECT * FROM users WHERE User = '$username'
									";
									$qrUser = mysqli_query($conn, $qr);
									if( mysqli_num_rows($qrUser) > 0 ){
										echo "Tên tài khoản đã tồn tại";
									}
									else{
										$qrNew = "
											INSERT INTO users(User,Password,Email,idReport,idDevice,idMessage,idAdmin) 
											VALUES('$username','$password','$email',0,0,0,0)
										";
										$qrNewUpdate = mysqli_query($conn, $qrNew);
										if($qrNewUpdate){
											echo "Đăng ký thành công";
										}
										else{
											echo "Đăng ký thất bại";
										}
									}
								}
								else{
									echo "Nhập sai mật khẩu";
								}
							}
						?>
					</div></b>
					<div id="signinbtn">Already have an account | <a href="index.php"><b>Sign in</b></a></div><br/>
					<input id="signupbtn" type="submit" name="btnDangky" value="Đăng ký" />
				</form>
			</div>
		</div>
	</div>
</body>
</html>