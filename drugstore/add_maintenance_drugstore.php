<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO maintenance_drugstore VALUES (NULL, ?, ?, ?, ?, ?)");
	$result->bind_param("sssss", htmlspecialchars($_POST['id_maintenance_drugstore'], ENT_QUOTES), htmlspecialchars($_POST['product'], ENT_QUOTES), htmlspecialchars($_POST['orders'], ENT_QUOTES), htmlspecialchars($_POST['availability_date'], ENT_QUOTES), htmlspecialchars($_POST['worker'], ENT_QUOTES));
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