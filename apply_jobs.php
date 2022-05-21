<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/navbar.css">
    <link rel="stylesheet" href="./css/jobs_body.css">
    <title>View Interview calls | Kidsitter</title>
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

    <div class="body-area">



<?php

  //echo "<a href='home.php'> < Back to jobs</a>";
  
  require_once('dbconfig.php');
  $connect = mysqli_connect( HOST, USER, PASS, DB )
	or die("Can not connect");
  ?>
  <table border="1">
    <thead>
      <tr>
        <th>Job day</th>
        <th>Title</th>
        <th>Details</th>
        <th>Relation with client</th>
        <th>Kid age</th>
        <th>Salary Range</th>
        <th>Job Address</th>

        <th>License Number</th>
        <th>Phone</th>
        <th>Experience</th>
        <th>Expertise</th>
        <th>Sitter Name</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
  <?php

  $results = mysqli_query( $connect, "SELECT * FROM jobs" )
	or die("Can not execute query");

  while( $rows = mysqli_fetch_array( $results ) ) {
      extract($rows);
      echo "<tr>";
        echo "<td>";
          echo "$job_day";
        echo "</td>";

        echo "<td>";
          echo "$title";
        echo "</td>";

        echo "<td>";
          echo "$details";
        echo "</td>";

        echo "<td>";
          echo "$R_with_client";
        echo "</td>";

        echo "<td>";
          echo "$kid_age";
        echo "</td>";

        echo "<td>";
          echo "$salary_range";
        echo "</td>";

        echo "<td>";
          echo "$address";
        echo "</td>";



        
    
  }
   <a href="./.php">jobpost.php<button class="btn btn-primary" style="margin-left: 50%">Apply</button></a>
?>
    </tbody>
  </table>
</div