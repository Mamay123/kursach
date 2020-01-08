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
				<form action="add_product.php" method="post">
					
						<legend>Новая запись</legend>
							<label for="name_product">Название лекарства: </label><br><input type="text" id="name_product" name="name_product" placeholder="name_product"><br>
							<label for="price_product">Цена лекарства: </label><br><input type="text" id="price_product" name="price_product" placeholder="price_product"><br>
							<label for="product_description">Описание лекарства: </label><br><input type="text" id="product_description" name="product_description" placeholder="product_description"><br>
							<input type="submit" name="submit" value="Добавить">
						
				</form>
            </div>
        </div>
    </body>
</html>