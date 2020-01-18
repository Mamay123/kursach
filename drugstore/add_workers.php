<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO workers VALUES (NULL, ?, ?, ?, ?)");
	$result->bind_param("ssss", htmlspecialchars($_POST['fio_worker'], ENT_QUOTES), htmlspecialchars($_POST['position'], ENT_QUOTES), htmlspecialchars($_POST['phone_number_worker'], ENT_QUOTES), htmlspecialchars($_POST['worker_adress'], ENT_QUOTES));
	if ($result->execute() === TRUE)
	{
		echo "<script type='text/javascript'>alert('Record created!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".$conn->error."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>