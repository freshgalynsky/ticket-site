<?php
	try {
		$conn = new PDO("mysql:dbname=dbname;host=localhost", "dbuser", "dbpass");
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	
	$query = $conn->prepare("SELECT id FROM log WHERE sissue = :sissue AND udevice = :udevice AND udate >= CURDATE()");
	$query->bindValue(":sissue", "Connection failed", PDO::PARAM_STR);
	$query->bindValue(":udevice", "192.168.0.15", PDO::PARAM_STR);
	$query->execute();
	$result_connection = $query->fetchColumn();
	
	if($query->rowCount() > 0)
	{
		$response_connection = "Error";
	}
	else
	{
		$response_connection = "OK";
	}
	
	$query = $conn->prepare("SELECT id FROM log WHERE sissue = :sissue AND udevice = :udevice AND udate >= CURDATE()");
	$query->bindValue(":sissue", "Empty record", PDO::PARAM_STR);
	$query->bindValue(":udevice", "192.168.0.15", PDO::PARAM_STR);
	$query->execute();
	$result_empty = $query->fetchColumn();
	
	if($query->rowCount() > 0)
	{
		$response_empty = "Error";
	}
	else
	{
		$response_empty = "OK";
	}
	
	$query = $conn->prepare("SELECT id FROM log WHERE sissue = :sissue AND udevice = :udevice AND udate >= CURDATE()");
	$query->bindValue(":sissue", "Fail key", PDO::PARAM_STR);
	$query->bindValue(":udevice", "192.168.0.15", PDO::PARAM_STR);
	$query->execute();
	$result_key = $query->fetchColumn();
	
	if($query->rowCount() > 0)
	{
		$response_key = "Error";
	}
	else
	{
		$response_key = "OK";
	}
	
	echo json_encode(array(
		"connection"	=>	$response_connection,
		"empty"	=>	$response_empty,
		"key"	=>	$response_key
	));
?>