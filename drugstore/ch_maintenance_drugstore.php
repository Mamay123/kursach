<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE maintenance_drugstore SET id_main = ?, id_maintenance_drugstore = ?, product = ?, order_id = ?, availability_date = ?, worker = ? WHERE id_main = ?");
	$result->bind_param("sssssss", htmlspecialchars($_POST['id_main'], ENT_QUOTES), htmlspecialchars($_POST['id_maintenance_drugstore'], ENT_QUOTES), htmlspecialchars($_POST['product'], ENT_QUOTES), htmlspecialchars($_POST['num_order'], ENT_QUOTES), htmlspecialchars($_POST['availability_date'], ENT_QUOTES), htmlspecialchars($_POST['worker'], ENT_QUOTES), htmlspecialchars($_SESSION['orders'], ENT_QUOTES));
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