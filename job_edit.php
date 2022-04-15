<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/jobs_body.css">
    <title>Kidsitter</title>
</head>

<body>
    <div class="topbar">
        <div class="logo">
            <img src="./img/logo.svg" alt="">
        </div>
        <button>Log out</button>
    </div>
    <div class="navbg">
        <div class="nav">
            <a class="link link-active flex-center" href="#">Jobs</a>
            <a class="link flex-center" href="#">Interviews</a>
            <a class="link flex-center" href="#">BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center" href="#">My Profile</a>
        </div>
    </div>
	<br>
    <div class="body-area">



<?php

	$id = $_GET["job_id"];
	echo "<a href='job_details_client.php?job_id=$id'> < Back to  job details</a>";

    require_once('dbconfig.php');
  $connect = mysqli_connect( HOST, USER, PASS, DB )
	or die("Can not connect");


  $results = mysqli_query( $connect, "SELECT * FROM jobs where job_id = $id" )
	or die("Can not execute query");

  while( $rows = mysqli_fetch_array( $results ) ) {
      extract($rows);
?>
    <form method=get action=job_edit_result.php>
		<input type=hidden name=job_id value='<?php echo $job_id; ?>'> <br>

		Title:<br> 
        <input type=text name=title value='<?php echo $title; ?>'> <br>

        Details:<br>
        <textarea type=text name=details><?php echo $details; ?></textarea><br>
        
        Relationship with Kid:<br>
        <input type=text name=R_with_client value='<?php echo $R_with_client; ?>'> <br>
        
        Kid Age:<br>
        <input type=text name=kid_age value='<?php echo $kid_age; ?>'> <br>

        Salary Range:<br>
        <input type=text name=salary_range value='<?php echo $salary_range; ?>'> <br>
        
        Address:<br>
        <input type=text name=address value='<?php echo $address; ?>'> <br>
        Work Days/weekly:<br>
        <input type=text name=job_day value='<?php echo $job_day; ?>'> <br>

		<input class="submit" type=submit value=Update>
</form>


<?php
  }

?>



