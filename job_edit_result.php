<?php

	$job_id = $_GET["job_id"];
	$title = $_GET["title"];
    $details = $_GET["details"];
    $R_with_client = $_GET["R_with_client"];
    $kid_age = $_GET["kid_age"];
    $salary_range = $_GET["salary_range"];
    $address = $_GET["address"];
    $job_day = $_GET["job_day"];

	require_once('dbconfig.php');

	$connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");



	$query 	= "UPDATE jobs 
    SET title='$title', details='$details', R_with_client='$R_with_client' , address = '$address', kid_age='$kid_age',salary_range='$salary_range', job_day='$job_day' 
    WHERE job_id = $job_id";

	// echo $query;



	mysqli_query( $connect, $query )

		or die("Can not execute query");



	echo "<p>Record updated:<br>";
?>

<script>
    setTimeout(function(){
            window.location.href ='job_details_client.php?job_id=<?php echo $job_id;?>';
         }, 20);
</script>