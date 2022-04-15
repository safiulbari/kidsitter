<style>
    @import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);
    body{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    p{
        font-family: poppins;
        font-size: 26px;
        text-align: center;
    }
</style>
<?php

	$client_id = $_GET["client_id"];
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

    mysqli_query($connect, "INSERT INTO `jobs`(`job_id`, `client_id`, `job_day`, `title`, `details`, `R_with_client`, `kid_age`, `salary_range`, `address`, `completed`, `SelectSitter_id`, `payment_status`) 
    VALUES ('','$client_id','$job_day','$title','$details','$R_with_client','$kid_age','$salary_range','$address','','','')")
    or die("cant execute query");
	echo "<p>Jobs successfully created</p>";

?>

<script>
    setTimeout(function(){
            window.location.href = './home.php';
         }, 20);
</script>