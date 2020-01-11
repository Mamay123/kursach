<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$_SESSION['description_order'] = $_POST['description_order'];
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT fio_buyer FROM buyer";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
	}
	$pos = "SELECT name_product FROM product";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all2 = mysqli_fetch_all($result);
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
				<form action='ch_orders.php' method='post'>
					
						<legend>Изменение записи</legend>
							<label for='num_order'>Номер заказа: </label><br><input type='text' id='num_order' name='num_order' placeholder='num_order'><br>
							<label for='description_order'>Заказ: </label><br><select id='description_order' name='description_order'>
								<?php
									for($i = 0;$i < count($all2); $i = $i+1)
									{
										$pos = "SELECT id_product FROM product WHERE name_product = '".$all2[$i][0]."'";
										$res = mysqli_query($conn, $pos);
										if ($res)
										{
											$val = mysqli_fetch_all($res);
											$j = $i + 1;
											echo "<option value='".$val[0][0]."'>".$all2[$i][0]."</option>";
										}
									}
								?>
							</select><br>
							<label for='name_buyer'>Покупатель: </label><br><select name='name_buyer' id='name_buyer'>
								<?php
									for($i = 0;$i < count($all); $i = $i+1)
									{
										$pos = "SELECT id_buyer FROM buyer WHERE fio_buyer = '".$all[$i][0]."'";
										$res = mysqli_query($conn, $pos);
										if ($res)
										{
											$val = mysqli_fetch_all($res);
											$j = $i + 1;
											echo "<option value='".$val[0][0]."'>".$all[$i][0]."</option>";
										}
									}
								?>
							</select><br>
							<input type='submit' name='submit' value='Изменить'>
						
				</form>
            </div>
        </div>
    </body>
</html>