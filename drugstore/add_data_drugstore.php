<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
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
				<form action="add_drugstore.php" method="post">
					
						<legend>Новая запись</legend>
							<label for="drugstore_adress">Адресс аптеки: </label><br><input type="text" id="drugstore_adressd" name="drugstore_adress" placeholder="drugstore_adress"><br>
							<label for="phone_number_drugstore">Телефон аптеки: </label><br><input type="text" id="phone_number_drugstore" name="phone_number_drugstore" placeholder="phone_number_drugstore"><br>
							<input type="submit" name="submit" value="Добавить">
					
				</form>
            </div>
        </div>
    </body>
</html>