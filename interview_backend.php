<?php
	error_reporting(0);
    require_once('dbconfig.php');
    $id = $_GET['interview_no'];

	$link = mysqli_connect(HOST, USER, PASS, DB );
	
	$status = 'OK';
	$content = [];

	if (mysqli_connect_errno()) {
		$status = 'ERROR';
		$content = mysqli_connect_error();
	}

	$query = "UPDATE interviews SET status = '1' WHERE interview_no = $id;";
	if ($result = mysqli_query($link, $query)) {
		/* fetch associative array */
		while ($row = mysqli_fetch_assoc($result)) {
			$content[] = $row;
		}
	}
	$data = ["status" => $status, "content" => $content];

	header('Content-type: application/json');
	echo json_encode($data);
?>