<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE positions SET id_position = ?, name_position = ?, description_positions = ? WHERE id_position = ?");
	$result->bind_param("ssss",  htmlspecialchars($_POST['id_position'], ENT_QUOTES), htmlspecialchars($_POST['name_position'], ENT_QUOTES), htmlspecialchars($_POST['classification_lvl'], ENT_QUOTES), htmlspecialchars($_SESSION['positions'], ENT_QUOTES));
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