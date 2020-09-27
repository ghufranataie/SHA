
<?php
	$servername = "localhost:3308";
    $username = "root";
    $password = "";
    $dbname = "sha";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql1 = "insert into ware (name, preis, menge, ticketnr) values('test3', 5.5, 120, 'tecTest')";
    mysqli_query($conn, $sql1);
	$last_id = mysqli_insert_id($conn);

	$sql2 = "INSERT INTO bestellung (warennr, bestellnr, datum, besteller, gesamtwert, po_nr, ebest_ekw, we_gebucht, psp_element) 
								VALUES ('$last_id', 455, '2020/05/05', 'ssfdf', 5.54, 486, 876, 'sdsdgf', 8455)";
    mysqli_query($conn, $sql2);
    mysqli_close($conn);
?>



<!doctype html> 
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>