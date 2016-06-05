<?php session_start();

	if( !isset( $_SESSION['UserData']['Username'] ) )
	{
		header("location:login.php");
		exit;
	}
	
	print "Belépve ;)";
	
	print "<a href='login.php'>Kilépés</a>";
	
	$XML = simplexml_load_file("../hungarian.xml");
			
			
	if($XML)
	{
		print "Sikeres";
	}
	
	$number = 0;
	
	print "<h1>Kezdőlap</h1>";
	
	print "<form class='welcome_editing' action='szerkeszt.php' method='POST'>";
	
	print "<h2>".$XML->home->title1."</h2>";
	
	print "<textarea name='description1'>".$XML->home->description1."</textarea>";
	
	print "<input type='hidden' name='id' value='".$number."'>";
	
	print "<input class='edit' type='submit' value='Szerkesztés'>";
			
	print "</form>";

?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../design/style.css">
	</head>
	<body>
	</body>
</html>