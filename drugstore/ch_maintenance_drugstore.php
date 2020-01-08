<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE maintenance_drugstore SET id_main = ?, id_maintenance_drugstore = ?, product = ?, order_id = ?, availability_date = ?, worker = ? WHERE id_main = ?");
	$result->bind_param("sssssss", $_POST['id_main'], $_POST['id_maintenance_drugstore'], $_POST['product'], $_POST['num_order'], $_POST['availability_date'], $_POST['worker'], $_SESSION['orders']);
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