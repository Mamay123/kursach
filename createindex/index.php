<?php
	$servername = "localhost";
	$dbname = "drugstore";
	$username = "admin";
	$password = "6VEAFLMrPB14K3a";
	set_time_limit(600);
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if (!$conn)
	{
		die("connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfully!\n";
	
	
	// buyer
	$sql = "CREATE INDEX a ON buyer (id_buyer)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX aa ON buyer (id_buyer, phone_number_buyer)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX aaa ON buyer (phone_number_buyer)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//drugstore
	$sql = "CREATE INDEX b ON drugstore (id_drugstore)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX bb ON drugstore (phone_number_drugstore)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX bbb ON drugstore (id_drugstore, phone_number_drugstore)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//maintenance_drugstore
	$sql = "CREATE INDEX d ON maintenance_drugstore (id_main)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX dd ON maintenance_drugstore (id_maintenance_drugstore)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX ddd ON maintenance_drugstore (product)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX dddd ON maintenance_drugstore (id_maintenance_drugstore, product)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//orders
	$sql = "CREATE INDEX c ON orders (num_order)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX cc ON orders (name_buyer)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX ccc ON orders (num_order, name_buyer)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//positions
	$sql = "CREATE INDEX f ON positions (id_position)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}	
	
	//product
	$sql = "CREATE INDEX n ON product (id_product)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX nn ON product (price_product)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX nnn ON product (id_product, price_product)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//workers
	$sql = "CREATE INDEX r ON workers (id_worker)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX rr ON workers (position)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX rrr ON workers (phone_number_worker)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX rrrr ON workers (id_worker, position)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX rrrrr ON workers (id_worker, position, phone_number_worker)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//tb1
	$sql = "CREATE INDEX m ON tb1 (email_adress)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX mm ON tb1 (privilege)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX mmm ON tb1 (email_adress, privilege)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//tb3
	$sql = "CREATE INDEX t ON tb3 (card_num)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX tt ON tb3 (balance)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	$sql = "CREATE INDEX ttt ON tb3 (card_num, balance)";
	if (mysqli_query($conn, $sql))
	{
		echo "Index created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
?>
