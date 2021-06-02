<?php
include 'connected.php';
header("Access-Control-Allow-Origin: *");
error_reporting(E_ERROR | E_PARSE);
if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    
    exit;
}

if (!$link->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $link->error);
    exit();
	}

if (isset($_GET)) {
	if ($_GET['isAdd'] == 'true') {
				
		
		$idGrp = $_GET['idGrp'];
		$idShop = $_GET['idShop'];
		$result = mysqli_query($link, "SELECT * FROM foodtable WHERE idGrp='$idGrp' and idShop='$idShop' ORDER BY id DESC");

		if ($result) {

			while($row=mysqli_fetch_assoc($result)){
			$output[]=$row;

			}	// while

			echo json_encode($output);

		} //if

	} else echo "Welcome Master xaiy";	// if2
   
}	// if1


	mysqli_close($link);
?>