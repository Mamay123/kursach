<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	
	$conn = mysqli_connect($servername, $username, $password);
	
	if (!$conn)
	{
		die("connection failed: " . mysqli_connect_error());
	}
	echo "Connection successfully!<br>";
	
	//база данных
	$sql = "CREATE DATABASE drugstore";
	
	if (mysqli_query($conn, $sql))
	{
		echo "Database drugstore created successfully!<br>";
	}
	else
	{
		echo "Error: " . mysqli_error($conn);
		echo "<br>";
	}
	//таблица #1 должность
	$dbname = "drugstore";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	$sql = "CREATE TABLE positions(
		id_position SERIAL PRIMARY KEY,
		name_position text NOT NULL,
		description_positions text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table positions created successfully!<br>";
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #2 тип услуги (товары) 
	$sql = "CREATE TABLE product(
		id_product SERIAL PRIMARY KEY,
		name_product text NOT NULL,
		price_product integer NOT NULL,
		product_description text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table product created successfully!<br>";
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #3 сотрудники
	$sql = "CREATE TABLE workers(
		id_worker SERIAL PRIMARY KEY,
		fio_worker text NOT NULL,
		position integer REFERENCES positions (id_position),
		phone_number_worker integer NOT NULL,
		worker_adress text)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table workers created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #4 владелец (покупатель)
	$sql = "CREATE TABLE buyer(
		id_buyer SERIAL PRIMARY KEY,
		fio_buyer text NOT NULL,
		phone_number_buyer integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table buyer created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #5 автомобиль (заказ)
	$sql = "CREATE TABLE orders(
		num_order SERIAL PRIMARY KEY,
		description_order text,
		name_buyer integer REFERENCES buyer (id_buyer))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table order created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #6 сервисы  (аптеки) 
	$sql = "CREATE TABLE drugstore(
		id_drugstore SERIAL PRIMARY KEY,
		drugstore_adress text,
		phone_number_drugstore integer NOT NULL)";

	if (mysqli_query($conn, $sql))
	{
		echo "Table drugstore created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//таблица #7 обслуживающий сервис (обслуживающая аптека)
	$sql = "CREATE TABLE maintenance_drugstore(
		id_main SERIAL PRIMARY KEY,
		id_maintenance_drugstore integer REFERENCES drugstore (id_drugstore),
		product integer REFERENCES product (id_product),
		order_id integer REFERENCES orders (num_order),
		availability_date timestamp,
		worker integer REFERENCES workers (id_worker))";

	if (mysqli_query($conn, $sql))
	{
		echo "Table maintenance_drugstore created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//
	//       ТРИГГЕРЫ УДАЛЕНИЯ
	//
	
	//триггер #1 удаление владельца
	$sql = "CREATE TRIGGER remove_buyer AFTER DELETE ON buyer
			FOR EACH ROW BEGIN
			   DELETE FROM orders WHERE buyer = OLD.id_buyer;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_buyer created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #2 удаление машины
	$sql = "CREATE TRIGGER remove_order AFTER DELETE ON orders
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_drugstore WHERE order_id = OLD.num_order;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_order created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #3 удаление должности
	$sql = "CREATE TRIGGER remove_positions AFTER DELETE ON positions
			FOR EACH ROW BEGIN
			   DELETE FROM workers WHERE position = OLD.id_position;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_positions created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #4 удаление работника
	$sql = "CREATE TRIGGER remove_workers AFTER DELETE ON workers
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_drugstore WHERE worker = OLD.id_worker;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_workers created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #5 удаление сервисов
	$sql = "CREATE TRIGGER remove_drugstore AFTER DELETE ON drugstore
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_drugstore WHERE id_maintenance_drugstore = OLD.id_drugstore;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_services created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #6 удаление услуг
	$sql = "CREATE TRIGGER remove_product AFTER DELETE ON product
			FOR EACH ROW BEGIN
			   DELETE FROM maintenance_drugstore WHERE product = OLD.id_product;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger remove_product created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	
	//
	//       ТРИГГЕРЫ ИЗМЕНЕНИЯ
	//
	
	//триггер #1 изменение владельца
	$sql = "CREATE TRIGGER update_buyer AFTER UPDATE ON buyer
			FOR EACH ROW BEGIN
			   UPDATE orders SET buyer = NEW.id_buyer WHERE buyer = OLD.id_buyer;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_buyer created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #2 изменение машины
	$sql = "CREATE TRIGGER update_order AFTER UPDATE ON orders
			FOR EACH ROW BEGIN
			   UPDATE maintenance_drugstore SET order_id = NEW.num_order WHERE order_id = OLD.num_order; 
			END";
	// NEW.id_buyer
	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_order created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #3 изменение должности
	$sql = "CREATE TRIGGER update_positions AFTER UPDATE ON positions
			FOR EACH ROW BEGIN
			   UPDATE workers SET position = NEW.id_position WHERE position = OLD.id_position;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_positions created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #4 изменение работника
	$sql = "CREATE TRIGGER update_workers AFTER UPDATE ON workers
			FOR EACH ROW BEGIN
			   UPDATE maintenance_drugstore SET worker = NEW.id_worker WHERE worker = OLD.id_worker;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_workers created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #5 изменение сервисов
	$sql = "CREATE TRIGGER update_drugstore AFTER UPDATE ON drugstore
			FOR EACH ROW BEGIN
			   UPDATE maintenance_drugstore SET id_maintenance_drugstore = NEW.id_drugstore WHERE id_maintenance_drugstore = OLD.id_drugstore;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_drugstore created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
	//триггер #6 изменение услуг
	$sql = "CREATE TRIGGER update_product AFTER UPDATE ON product
			FOR EACH ROW BEGIN
			   UPDATE maintenance_drugstore SET product = NEW.id_product WHERE product = OLD.id_product;
			END";

	if (mysqli_query($conn, $sql))
	{
		echo "Trigger update_product created successfully!\n" . '<br>';
	}
	else
	{
		echo "Error: " . mysqli_error($conn) . '<br>';
	}
?>