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
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
        <div class="wrapper">
            <div id="article">
				
					<legend>Выберите действие</legend>
						<form action="select_tb1.php" method="post"><input type="submit" name="submit" value="Таблица tb1"><br></form>
						<form action="select_tb2.php" method="post"><input type="submit" name="submit" value="Таблица tb2"><br></form>
						<form action="select_tb3.php" method="post"><input type="submit" name="submit" value="Таблица tb3"><br></form>
						<form action="select_orders.php" method="post"><input type="submit" name="submit" value="Таблица orders"><br></form>
						<form action="select_buyer.php" method="post"><input type="submit" name="submit" value="Таблица buyer"><br></form>
						<form action="select_maintenance_drugstore.php" method="post"><input type="submit" name="submit" value="Таблица maintenance_drugstore"><br></form>
						<form action="select_positions.php" method="post"><input type="submit" name="submit" value="Таблица positions"><br></form>
						<form action="select_drugstore.php" method="post"><input type="submit" name="submit" value="Таблица drugstore"><br></form>
						<form action="select_product.php" method="post"><input type="submit" name="submit" value="Таблица product"><br></form>
						<form action="select_workers.php" method="post"><input type="submit" name="submit" value="Таблица workers"><br></form>
						<form action="interface.php" method="post"><input type="submit" name="submit" value="Назад"><br></form>
				
            </div>
        </div>
    </body>
</html>