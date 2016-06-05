<?php session_start();
		
	if( isset( $_POST['Submit'] ) )
    {
        // Hozzáférések adatai - adatbázisból kellene jönniük! username => password (hash)
        $logins = array(
            'teszt' => '6c90aa3760658846a86a263a4e92630e',
            'Oliver' => '27090706d42a2525b9a07222f68dd3d4'
        );
       
        $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
               
        if( isset( $logins[$Username] ) && $logins[$Username] == md5($Password) )
        {
            $_SESSION['UserData']['Username'] = $Username;
            header("location:index.php");
            exit;
        }
        else
        {
            $msg="Helyten felhasználónév vagy jelszó!";
        }
    }
?>
<html lang="hu">
	<head>
		<title>ADMIN</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../design/style.css">
	</head>
	<body>	
		<h1>ADMIN</h1>
		<form class="container" action="" method="post" name="Login_Form">		
			<input class="text" name="Username" type="text" placeholder="Felhasználónév">	
			<input class="text" name="Password" type="password" placeholder="Jelszó">
			<input class="text" name="Submit" type="submit" value="Belépés">
		</form>
		<?php 
			if( isset($msg) )
			{
				print "<div class='error'>".$msg."</div>";
			}
		?>
		
		
	</body>
</html>