<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE orders SET num_order = ?, description_order = ?, name_buyer = ? WHERE num_order = ?");
	$result->bind_param("ssss", htmlspecialchars($_POST['num_order'], ENT_QUOTES), htmlspecialchars($_POST['description_order'], ENT_QUOTES), htmlspecialchars($_POST['name_buyer'], ENT_QUOTES), htmlspecialchars($_SESSION['description_order'], ENT_QUOTES));
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