<?php
	error_reporting(0);
    require_once('dbconfig.php');
    $sitter_id = $_GET['sitter_id'];

	$link = mysqli_connect(HOST, USER, PASS, DB );
	
	$status = 'OK';
	$content = [];

	if (mysqli_connect_errno()) {
		$status = 'ERROR';
		$content = mysqli_connect_error();
	}

	$query = "SELECT * FROM sitter where sitter_id = $sitter_id";

	if ($result = mysqli_query($link, $query)) {
		/* fetch associative array */
		while ($row = mysqli_fetch_assoc($result)) {
			$content[] = $row; // push value to array
		}
	}
	$data = ["status" => $status, "content" => $content];

	header('Content-type: application/json');
	echo json_encode($data); // get all products in json format.
?>