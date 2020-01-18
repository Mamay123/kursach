<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("DELETE FROM maintenance_drugstore WHERE id_main = ?");
	$result->bind_param("s", $_POST['orders']);
	if ($result->execute() === TRUE)
	{
		echo "<script type='text/javascript'>alert('Record removed!');</script>";
	}
	else
	{
		echo "<script type='text/javascript'>alert('Error: ".$conn->error."');</script>";
	}
	echo "<script>document.location.href = 'interface.php'; </script>";
?>