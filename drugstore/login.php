<?php
	$_SESSION['user_name'] = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
	$_SESSION['password'] = htmlspecialchars($_POST['password'], ENT_QUOTES);
	require_once 'connection.php';
	$conn = mysqli_connect($servername, 'admin', '6VEAFLMrPB14K3a', $dbname);
	session_start();
	$user = htmlspecialchars($_POST['user_name'], ENT_QUOTES);
	$password = htmlspecialchars($_POST['password'], ENT_QUOTES);
	$password = md5($password);
	if ($conn)
	{
		$result =$conn->prepare("SELECT privilege, password FROM tb1 WHERE email_adress = ?");
		$result->bind_param("s", $user);
		$result->execute();
		$result = $result->get_result();
		if ($result)
		{
			$all = $result->fetch_all();
			if($all[0][1] === $password)
			{
				if ($all[0][0] === 1)
				{
					$_SESSION['privilege'] = 1;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else if ($all[0][0] === 2)
				{
					$_SESSION['privilege'] = 2;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else if ($all[0][0] === 3)
				{
					$_SESSION['privilege'] = 3;
					$_SESSION['conn'] = $conn;
					header('location: interface.php');
				}
				else echo "У вас нет прав!";
			}
			else echo "Неправильный пароль!";
		}
		else echo "Неправильный логин!";
	}
	else die("Ошибка: " . mysqli_connect_error());
?>
 <html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <body>
	<p><a href="logout.php">Повтор</a></p>
 </body></html>
