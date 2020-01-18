<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['drugstore'] = htmlspecialchars($_POST['drugstore'], ENT_QUOTES);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="wrapper">
            <div id="article">
				<form action="ch_drugstore.php" method="post">
					
						<legend>Изменение записи</legend>
							<label for="id_drugstore">ID аптеки: </label><br><input type="text" id="id_drugstore" name="id_drugstore" placeholder="id_drugstore"><br>
							<label for="drugstoree_adress">Адресс аптеки: </label><br><input type="text" id="drugstore_adress" name="drugstore_adress" placeholder="service_adress"><br>
							<label for="phone_number_drugstore">Телефон аптеки: </label><br><input type="text" id="phone_number_drugstore" name="phone_number_drugstore" placeholder="phone_number_drugstore"><br>
							<input type="submit" name="submit" value="Изменить">
						
				</form>
            </div>
        </div>
    </body>
</html>