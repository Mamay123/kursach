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
				<form action="add_buyer.php" method="post">
					
						<legend>Новая запись</legend>							
							<label for="fio_buyer">ФИО покупателя: </label><br><input type="text" id="fio_buyer" name="fio_buyer" placeholder="fio_buyer"><br>
							<label for="phone_number_buyer">Номер телефона покупателя: </label><br><input type="text" id="phone_number_buyer" name="phone_number_buyer" placeholder="phone_number_car_owner"><br>
							<input type="submit" name="submit" value="Добавить">
					
				</form>
            </div>
        </div>
    </body>
</html>