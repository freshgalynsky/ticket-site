<?php	
	try {
		$conn = new PDO("mysql:dbname=dbname;host=localhost", "dbuser", "dbpass");
	}
	catch (PDOException $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	
	$query = $conn->prepare("SELECT COUNT(id) FROM events WHERE udate >= CURDATE() AND udevice = :udevice");
	$query->bindValue(":udevice", "192.168.0.5", PDO::PARAM_STR);
	$query->execute();
	$result_day = $query->fetchColumn();
	
	$query = $conn->prepare("SELECT COUNT(id) FROM events WHERE MONTH(udate) >= MONTH(CURDATE()) AND udevice = :udevice");
	$query->bindValue(":udevice", "192.168.0.5", PDO::PARAM_STR);
	$query->execute();
	$result_month = $query->fetchColumn();
	
	$query = $conn->prepare("SELECT COUNT(id) FROM events WHERE udevice = :udevice");
	$query->bindValue(":udevice", "192.168.0.5", PDO::PARAM_STR);
	$query->execute();
	$result_total = $query->fetchColumn();
	
	$result_data = [
		"day"	=>	$result_day,
		"month"	=>	$result_month,
		"total"	=>	$result_total
	];
	
	echo json_encode($result_data);
?>