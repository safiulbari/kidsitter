<?php
    $client_id = 2;

    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


    $results = mysqli_query( $connect, "SELECT * FROM jobs where client_id = $client_id" )
		or die("Can not execute query");

?>
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
            <a class="link flex-center" href="./mybabysitter.php">My BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center" href="http://localhost/kidSitter/kidsitter/clientProfile.php">My Profile</a>
            

        </div>
    </div>
    <div class="jobs">
        <a class="big-btn" <?php echo "href='job_create.php?client_id=$client_id'"; ?>>
            <img src="./img/plus.svg" alt="">
            <p>Looking for a babysitter create a job post</p>
        </a>


        <?php
            // generate all job post using php 
            while( $rows = mysqli_fetch_array( $results ) ) {
                extract($rows);
        ?>
            

        <div class="job">
            <div>
                <h1 class="title"><?php echo "$title";?></h1>
                <!-- <p class="applied">21 Applied</p> -->
            </div> 
            <div class="btn-group">
                <?php echo "<a href='job_details_client.php?job_id=$job_id' class='primary-btn'>Details</a>"; ?>
                <?php echo "<a href='job_delete_client.php?job_id=$job_id' class='secondary-btn'>Delete</a>"; ?>
            </div>
        </div>
         <?php } ?>
    </div>
</body>

</html>