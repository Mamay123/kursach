<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO buyer (fio_buyer, phone_number_buyer) VALUES ( ?, ?)");
	$result->bind_param("ss", htmlspecialchars($_POST['fio_buyer'], ENT_QUOTES), htmlspecialchars($_POST['phone_number_buyer'], ENT_QUOTES));
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