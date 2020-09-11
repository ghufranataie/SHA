<?php
	require_once("cn.php");
	
	
		if(isset($_POST['myUser']) && isset($_POST['myPass'])){
			try{
                $mUser = $_POST['myUser'];
				$mPass = $_POST['myPass'];
                $q = 'select * from shatable where user = :user';
                $stm = $cn->prepare($q);
                $stm->bindValue(':user', $mUser);
                $stm->execute();
                $row = $stm->fetch();
				$hashPass = $row['pass'];
				if(password_verify($mPass, $hashPass)){
					header('location:index.php');
				}else{
					echo '<script> alert("Wrong user Name of password")</script>';
				}
			}catch(PDOException $ex){
				echo 'Insert Error - '.$ex->getMessage();
			}
		}
/*
$str = 'rocket';
$mstr = 'password';
$salt = 'Username20Jun96'; 
echo sprintf("The md5 hashed password of %s is: %s\n", $str, md5($str.$salt));
echo '<br>';
echo sprintf("The sha1 hashed password of %s is: %s\n", $str, sha1($str.$salt));
echo '<br>';
echo sprintf("The gost hashed password of %s is: %s\n", $str, hash('gost', $str.$salt));
echo '<br>';
echo sprintf("The gost hashed password of %s is : %s\n", $str, password_hash($str, PASSWORD_DEFAULT));
echo '<br>';
echo sprintf("The gost hashed password of %s is : %s\n", $str, password_hash($str, PASSWORD_BCRYPT));
echo '<br>';
echo '<br>';

$mySHA512 = hash("sha512", $str);
echo 'SHA512 = '.hash("sha512", $str, true).'<br>';
echo 'SHA256 = '.hash("sha256", $str).'<br>';
echo 'MD5 = '.hash("MD5", $str).'<br>';
echo 'MD2 = '.hash("MD2", $str).'<br>';
echo 'SHA1 = '.hash("SHA1", $str).'<br>';
echo 'SHA384 = '.hash("sha384", $str).'<br>';
echo 'haval224,5 = '.hash("haval224,5", $str).'<br>';
echo 'SHA3-512 = '.hash("sha3-512", $str).'<br>'.'<br>';

echo 'Encryption =  ' . crypt(hash("sha512", $str), PASSWORD_DEFAULT).'<BR>';

echo hash_file('sha512', 'cn.php', false).'<br>';

echo password_verify($str, $mySHA512);

echo '<br>';

print_r(hash_algos());*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style type="text/css">
		#myForm{
			margin: 0px;
			padding: 0px;
			width: 400px;
		}
		#myForm input, label, #mySignUp{
			margin: 0px 20px 20px 20px;
			width: 400px;
		}
		input{
			font-size: 25px;
		}
		#sbmt{
			background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
			
		}
		
	</style>
</head>

<body>
	<h1 style="margin-left: 20px;">Login Here</h1>
	<form action="#" method="post" id="myForm">
		<label for="myText">User Name</label>
		<input type="text" name="myUser" id="myText">
		<label for="myPass">Password</label>
		<input type="text" name="myPass" id="myPass">
		<input type="submit" id="sbmt" value="Login">
		<a href="register.php" id="mySignUp">Sign Up</a>
	</form>
</body>
</html>