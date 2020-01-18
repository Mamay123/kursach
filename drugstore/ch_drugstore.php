<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE drugstore SET id_drugstore = ?, drugstore_adress = ?, phone_number_drugstore = ? WHERE id_drugstore = ?");
	$result->bind_param("ssss", htmlspecialchars($_POST['id_drugstore'], ENT_QUOTES), htmlspecialchars($_POST['drugstore_adress'], ENT_QUOTES), htmlspecialchars($_POST['phone_number_drugstore'], ENT_QUOTES), htmlspecialchars($_SESSION['drugstore'], ENT_QUOTES));
	if ($result->execute() === TRUE)
	{
		echo "<script type='text/javascript'>alert('Record changed!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".$conn->error."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>