<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['buyers'] = htmlspecialchars($_POST['buyers'], ENT_QUOTES);
	
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
				<form action="ch_buyer.php" method="post">
					
						<legend>Новая запись</legend>
							<label for="id_buyer">ID покупателя: </label><br><input type="text" id="id_buyer" name="id_buyer" placeholder="id_buyer"><br>						
							<label for="fio_buyer">ФИО покапутеля: </label><br><input type="text" id="fio_buyer" name="fio_buyer" placeholder="fio_buyer"><br>
							<label for="phone_number_buyer">Номер телефона покупателя: </label><br><input type="text" id="phone_number_buyer" name="phone_number_buyer" placeholder="phone_number_buyer"><br>
							<input type="submit" name="submit" value="Добавить">
					
				</form>
            </div>
        </div>
    </body>
</html>