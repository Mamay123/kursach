<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$pos = "SELECT fio_buyer FROM buyer";
	$result = mysqli_query($conn, $pos);
	if ($result)
	{
		$all = mysqli_fetch_all($result);
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
				<form action='add_orders.php' method='post'>
					
						<legend>Новая запись</legend>	
							<label for='description_order'>Покупка: </label><br><input type='text' id='description_order' name='description_order' placeholder='description_order'><br>
							<label for='buyer'>Покупатель: </label><br><select name='buyer' id='owner'>
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
							<input type='submit' name='submit' value='Добавить'>
						
				</form>
            </div>
        </div>
    </body>
</html>