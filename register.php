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
		#mytbl{
			border-collapse: collapse;
			margin-top: 30px;
		}
	</style>
</head>

<body>
	<h1 style="margin-left: 20px;">Register New User</h1>
	
	<form action="#" method="post" id="myForm">
		<label for="username">Username</label>
		<input type="text" id="newUser" name="newUser">
		<label for="password">Password</label>
		<input type="text" id="newPass" name="newPass">
		<input type="submit" value="Register" id="sbmt">
		<a href="login.php" id="mySignUp">Login</a>
	</form>
	
	<?php
		require_once("cn.php");
		//testing();
		function testing(){
			global $cn;
			global $stmt;
			global $query;
			$stmt = $cn->query('select * from shatable');
			echo '<table border=1 id="mytbl"><tr>';
			echo '<th>ID</th><th>Username</th><th>Password</th>';
			while($row = $stmt->fetch()){
                echo '<tr><td>'. $row['id'].'</td>';
                echo '<td>'. $row['user'].'</td>';
                echo '<td>'. $row['pass'].'</td></tr>';
			}
			echo '</table>';
		}
    if(isset($_POST['newUser']) && isset($_POST['newPass'])){
        try{
            $nUser = $_POST['newUser'];
			$nPass = $_POST['newPass'];
            $q = 'insert into shatable (user, pass) values (:user, :pass)';
            $stm = $cn->prepare($q);
            $stm->bindValue(':user', $nUser);
			$stm->bindValue(':pass', hash("sha512", $nPass));
            $result = $stm->execute();
			if($result){
//				$stmt = $cn->query('select * from shatable');
//				echo '<table border=1><tr>';
//				echo '<th>ID</th><th>Username</th><th>Password</th>';
//				while($row = $stmt->fetch()){
//                	echo '<tr><td>'. $row['id'].'</td>';
//                	echo '<td>'. $row['user'].'</td>';
//                	echo '<td>'. $row['pass'].'</td></tr>';
//				}
//				echo '</table>';
				testing();
			}
            
        }catch(PDOException $ex){
            echo 'Insert Error - '.$ex->getMessage();
        }
    }
?>
</body>
</html>