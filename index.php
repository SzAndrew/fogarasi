<?php
session_start();
$path = $_GET['path'];
$pathArray = array();
if ( 0 < strlen($path) && 0 < count(explode('/', $path)) ) $pathArray = explode('/', $path);
$args = array();
foreach ( $pathArray as $item ) {
	if ( 1 < count(explode(':', $item)) && $arg = explode(':', $item) ) 
		$args[$arg[0]] = $arg[count($arg)-1];
	else $args[] = $item;
}
//if ( isset($args['sorrend']) && $args['sorrend'] == 'novekvo' ) ...
//die(var_dump($args));
	if( isset($args["subpage"] ) )
	{
		$subpage = $args["subpage"];
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
		<link rel="stylesheet" type="text/css" href="/design/main.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="jquery/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-blind.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-bounce.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-clip.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-drop.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-explode.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-fade.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-fold.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-highlight.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-pulsate.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-scale.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-shake.min.js"></script>
		<script type="text/javascript" src="jquery/jquery.ui.effect-slide.min.js"></script>
		<script type="text/javascript" src="jquery/wwb10.min.js"></script>
		<script type="text/javascript" src="js/javascript.js"></script>
	</head>
	<body>
		<?php
			if( !isset( $_SESSION["language"] ) )
			{
				$_SESSION["language"] = "hungarian";
			}
			
			if( isset($args["lang"]) && in_array($args["lang"], array('english', 'hungarian')) )
			{
				$_SESSION["language"] = $args["lang"];
			}
			
			$XML = simplexml_load_file( $_SESSION["language"] . '.xml' );
			
			
			
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
			/*további felsorolás*/
				if( isset($args["subpage"] ) && in_array($args["subpage"], array('home' , 'services' , 'rental' , 'usedcars' , 'contact', 'welcome')) )
				{
					include($args["subpage"] . '.php');
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
			<a href="/subpage:<?= $subpage; ?>/lang:english">EN</a>
			<a href="/subpage:<?= $subpage; ?>/lang:hungarian">HU</a>
		</footer>
	</body>
</html>