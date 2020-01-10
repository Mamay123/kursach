<?php
$servername = 'localhost';
$dbname = 'drugstore';
if ($_SESSION['privilege'] === 1)
{
	$username = 'admin';
	$password = '6VEAFLMrPB14K3a';
}
else if ($_SESSION['privilege'] === 2)
{
	$username = 's_user';
	$password = '6VEAFLMrPB14K3a';
}
else if ($_SESSION['privilege'] === 3)
{
	$username = 'user';
	$password = '6VEAFLMrPB14K3a';
}
?>