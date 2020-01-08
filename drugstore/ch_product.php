<?php
	session_start();
	if(!$_SESSION['conn'])
	{
		header('location: index.php');
	}
	require_once 'connection.php';
	$conn = new mysqli($servername, $username, $password, $dbname);
	$result =$conn->prepare("UPDATE product SET id_product = ?, name_product = ?, price_product = ?, product_description = ? WHERE id_product = ?");
	$result->bind_param("sssss", $_POST['id_product'], $_POST['name_product'], $_POST['price_product'], $_POST['product_description'], $_SESSION['product']);
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