<?php
	$XML = simplexml_load_file("../hungarian.xml");
	
	$XML->home[ intval( $_POST["id"] ) ]->description1 = $_POST["description1"];
	$XML->home[ intval( $_POST["id"] ) ]->description2 = $_POST["description2"];
	
	
	//a teljes XML memóriastruktúra visszaírása a fájlba
	$fm = fopen("../hungarian.xml", "w"); //w felülírási tulajdonság
	fwrite( $fm, $XML->asXML() );
	
	fclose($fm);
	
	header("Location:index.php");
?>