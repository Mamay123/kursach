<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("INSERT INTO product VALUES (NULL, ?, ?, ?)");
	$result->bind_param("sss", htmlspecialchars($_POST['name_product'], ENT_QUOTES), htmlspecialchars($_POST['price_product'], ENT_QUOTES), htmlspecialchars($_POST['product_description'], ENT_QUOTES));
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