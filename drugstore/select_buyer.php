<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251 " />
        <link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    <body>
	<style type="text/css">
		table {
			border-collapse: collapse;
		}
		table th,
		table td {
			padding: 0 3px;
		}
		table.brd th,
		table.brd td {
			border: 1px solid #000;
		}
	</style>
        <div class="wrapper">
            <div id="article">
				
					<legend>Выборка по таблице buyer.</legend>
							<form action = 'select_buyer.php' method = 'post'>
								<label for='num'>Выберите: </label><select name='num' id='num'>
									<?php
										$sql = "SELECT count(*) FROM buyer";
										$res = mysqli_query($conn, $sql);
										if ($res)
										{
											$all = mysqli_fetch_assoc($res);
											$count = $all['count(*)'];
											$int = intval($count/50);
											$drob = ($count/50)-intval($count/50);
											if($drob === 0)
											{
												$f = $int;
											}
											else
											{
												$f = $int+1;
											}
											for($k = 0;$k < $f; $k++)
											{
												$s = $k+1;
												$s1 = $k * 50;
												echo "<option value=". $s1 .">". $s ."</option>";
											}
										}
									?>
									<input type='submit' name='submit' value='Показать'>
								</select><br>
							</form >
							<table class="brd">
							<?php
								$column = htmlspecialchars($_POST['column'], ENT_QUOTES);
								$num = htmlspecialchars($_POST['num'], ENT_QUOTES);
								$num = intval($num);
								if($column!== NULL)
								{
									$os = array("id_buyer", "fio_buyer", "phone_number_buyer");
									if(!in_array($column, $os))
									{
										$column = "id_buyer";
									}
									$column = strval($column);
									if($_SESSION['column'] !== $column)
									{
										if($num === NULL)
										{
											$pos = $conn->prepare("SELECT * FROM buyer ORDER BY $column ASC LIMIT 50");
											//$pos->bind_param("s", $column);
										}
										else 
										{
											$pos = $conn->prepare("SELECT * FROM buyer ORDER BY $column ASC LIMIT 50 OFFSET ?");
											$pos->bind_param("s", $num);
										}
									}
									else
									{
										if($num === NULL)
										{
											$pos = $conn->prepare("SELECT * FROM buyer ORDER BY $column DESC LIMIT 50");
											//$pos->bind_param("s", $column);
										}
										else 
										{
											$pos = $conn->prepare("SELECT * FROM buyer ORDER BY $column DESC LIMIT 50 OFFSET ?");
											$pos->bind_param("s", $num);
										}
									}
									$_SESSION['column'] = $column;
								}
								else
								{
									if($num === NULL)
									{
										$pos = $conn->prepare("SELECT * FROM buyer LIMIT 50");
									}
									else 
									{
										$pos = $conn->prepare("SELECT * FROM buyer LIMIT 50 OFFSET ?");
										$pos->bind_param("s", $num);
									}
								}
								$pos1 = $conn->prepare("DESCRIBE buyer");
								$result = $pos1->execute();
								$q = $pos1->get_result();
								$arr = $q->fetch_all();
								$result = $pos->execute();
								if ($result)
								{
									$resultSet = $pos->get_result();
									$val = $resultSet->fetch_all();
									echo "<tr>";
									for($i = 0;$i < count($arr); $i = $i+1)
									{
										echo "<th><form action = 'select_buyer.php' method = 'post'><input type = 'hidden' name = 'column' value = ".$arr[$i][0]."> <input type='submit' name='submit' value=".$arr[$i][0]."></form></th>";
									}
									echo "</tr>";
									for($i = 0;$i < count($val); $i = $i+1)
									{
										echo "<tr>";
										for($j = 0;$j < count($val[$i]); $j = $j+1)
										{
											echo "<td>";
											print_r($val[$i][$j]);
											echo "</td>";
										}
										echo "</tr>";
									}
								}
							?>
							</table>
							<form action = 'select_buyer.php' method = 'post'>
								<label for='num'>Выберите: </label><select name='num' id='num'>
									<?php
										$sql = "SELECT count(*) FROM buyer";
										$res = mysqli_query($conn, $sql);
										if ($res)
										{
											$all = mysqli_fetch_assoc($res);
											$count = $all['count(*)'];
											$int = intval($count/50);
											$drob = ($count/50)-intval($count/50);
											if($drob === 0)
											{
												$f = $int;
											}
											else
											{
												$f = $int+1;
											}
											for($k = 0;$k < $f; $k++)
											{
												$s = $k+1;
												$s1 = $k * 50;
												echo "<option value=". $s1 .">". $s ."</option>";
											}
										}
									?>
									<input type='submit' name='submit' value='Показать'>
								</select><br>
							</form >
							<form action = 'interface.php' method = 'post'><input type='submit' name='submit' value='Назад'>
							</form >
				
            </div>
        </div>
    </body>
</html>