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
				
					<legend>Выберите действие</legend>
						<form action="remove_data_drugstore.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы drugstore"><br></form>
						<form action="remove_data_product.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы product"><br></form>
						<form action="remove_data_maintenance_drugstore.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы maintenance_drugstore"><br></form>
						<form action="remove_data_buyer.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы buyer"><br></form>
						<form action="remove_data_orders.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы orders"><br></form>
						<form action="remove_data_workers.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы workers"><br></form>
						<form action="remove_data_positions.php" method="post"><input type="submit" name="submit" value="Удалить данные для таблицы positions"><br></form>
						<form action="logout.php" method="post"><input type="submit" name="submit" value="Выйти с аккаунта"><br></form>
				
            </div>
        </div>
    </body>
</html>