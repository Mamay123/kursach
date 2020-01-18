<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['product'] = htmlspecialchars($_POST['product'], ENT_QUOTES);
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
				<form action="ch_product.php" method="post">
					
						<legend>Изменение записи</legend>
							<label for="id_product">ID услуги: </label><br><input type="text" id="id_product" name="id_product" placeholder="id_product"><br>
							<label for="name_product">Название услуги: </label><br><input type="text" id="name_product" name="name_product" placeholder="name_product"><br>
							<label for="price_product">Цена услуги: </label><br><input type="text" id="price_product" name="price_product" placeholder="price_product"><br>
							<label for="product_description">Описание услуги: </label><br><input type="text" id="product_description" name="product_description" placeholder="product_description"><br>
							<input type="submit" name="submit" value="Изменить">
					
				</form>
            </div>
        </div>
    </body>
</html>