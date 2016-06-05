<?php
session_start();
//htacces
/*$path = $_GET['path'];
$pathArray = array();
if ( 0 < strlen($path) && 0 < count(explode('/', $path)) ) $pathArray = explode('/', $path);

$args = array();
foreach ( $pathArray as $item ) {fasza ..
	if ( 1 < count(explode(':', $item)) && $arg = explode(':', $item) ) 
		$args[$arg[0]] = $arg[count($arg)-1];
	else $args[] = $item;
}

//if ( isset($args['sorrend']) && $args['sorrend'] == 'novekvo' ) ...

die(var_dump($args));*/
	if( isset($_GET["subpage"] ) )
	{
		$subpage = $_GET["subpage"];
	}
	else
	{
		$subpage = "home.php";
	}
	
?>
<!DOCTYPE html>
<html lang="hu">
	<head>
		<title>
			<?php
				if( $subpage == "home.php")
				{
					print "Kezdőlap";
				}
				
				if( $subpage == "welcome.php")
				{
					print "Bemutatkozás";
				}
				
				if( $subpage == "services.php")
				{
					print "Szolgáltatásaink";
				}	
				
				if( $subpage == "rental.php")
				{
					print "Autóink";
				}	
				
				if( $subpage == "usedcars.php")
				{
					print "Használt autók";
				}	
				
				if( $subpage == "contact.php")
				{
					print "Kapcsolat";
				}
			?>
		</title>
		<meta name="author" content="Szolnoki András">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="design/main.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<?php
			if( !isset( $_SESSION["activelanguage"] ) )
			{
				$_SESSION["activelanguage"] = "hungarian.xml";
			}
			
			if( isset($_GET["lang"] ) )
			{
				$_SESSION["activelanguage"] = $_GET["lang"].".xml";
			}
			
			$XML = simplexml_load_file( $_SESSION["activelanguage"] );
			
			//print $XML->home->title1;
			
			/*if($XML)
			{
				print "Sikeres";
			}
			else
			{
				print "Sikertelen";
			}*/
		?>
		<header>
			<?php
				include("header.php");
			?>
		</header>
		<section>
			<?php
				if( isset($_GET["subpage"] ) )
				{
					include($_GET["subpage"]);
				}
				else
				{
					include("home.php");
				}
			?>
		</section>
		<footer>
			<?php
				include("footer.php");
				
			?>
			<a href="index.php<?= 0 < count($_GET) ? '?' . http_build_query($_GET) . '&' : '?' ?>lang=english">EN</a>
			<a href="index.php?lang=hungarian">HU</a>
		</footer>
	</body>
</html>