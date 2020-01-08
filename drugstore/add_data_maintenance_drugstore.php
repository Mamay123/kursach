<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT id_drugstore FROM drugstore";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_id_drugstore = mysqli_fetch_all($result);
	}
	$pos = "SELECT name_product FROM product";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_name_product = mysqli_fetch_all($result);
	}
	$pos = "SELECT num_order FROM orders";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_num_order = mysqli_fetch_all($result);
	}
	$pos = "SELECT fio_worker FROM workers";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all_fio_worker = mysqli_fetch_all($result);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=windows-1251 ' />
        <link rel='stylesheet' type='text/css' href='style.css'>
    </head>
    <body>
        <div class='wrapper'>
            <div id='article'>
				<form action='add_maintenance_drugstore.php' method='post'>
					
						<legend>Новая запись</legend>
							<label for='id_maintenance_drugstore'>Аптека: </label><br><select name='id_maintenance_drugstore' id='id_maintenance_drugstore'>
								<?php
									for($i = 0;$i < count($all_id_drugstore); $i = $i+1)
									{
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all_id_drugstore[$i][0]."'>".$all_id_drugstore[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='product'>Лекарство: </label><br><select name='product' id='product'>
								<?php
									for($i = 0;$i < count($all_name_product); $i = $i+1)
									{
										$pos = "SELECT id_product FROM product WHERE name_product = '".$all_name_product[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$val[0][0]."'>".$all_name_product[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='orders'>Заказ: </label><br><select name='orders' id='orders'>
								<?php
									for($i = 0;$i < count($all_num_order); $i = $i+1)
									{
										$pos = "SELECT description_order FROM orders WHERE num_order = '".$all_num_order[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$all_num_order[$i][0]."'>".$all_num_order[$i][0].", ".$val[0][0]."</option>";
										}
									}
								?>
								</select><br>
							<label for='availability_date'>Дата доставки: </label><br><input type='text' id='availability_date' name='availability_date' placeholder='availability_date'><br>
							<label for='worker'>Работник: </label><br><select name='worker' id='worker'>
								<?php
									for($i = 0;$i < count($all_fio_worker); $i = $i+1)
									{
										$pos = "SELECT id_worker FROM workers WHERE fio_worker = '".$all_fio_worker[$i][0]."'";
										$result = mysqli_query($conn, $pos);
										if ($result)
										{
											$val = mysqli_fetch_all($result);
											echo "<option value='".$val[0][0]."'>".$all_fio_worker[$i][0]."</option>";
										}
									}
								?>
								</select><br>
							<input type='submit' name='submit' value='Добавить'>
						
				</form>
            </div>
        </div>
    </body>
</html>