<?php

    require_once('../dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


    $results = mysqli_query( $connect, "SELECT * FROM clients")
		or die("Can not execute query");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/jobs_body.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>

<style>
        .table {
        margin: 40px 50px;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 90%;
        }

        .table td, .table th {
        border: 1px solid #ddd;
        padding: 8px;
        }

        .table tr:nth-child(even){background-color: #f2f2f2;}

        .table tr:hover {background-color: #ddd;}

        .table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: white;
        color: black;
        }
</style>


</head>
<body>
    <div class="topbar">
        <div class="logo">
            <img src="../img/logo.svg" alt="">
        </div>
        <button>Log out</button>
    </div>

    <div class="wraper">
        <div class="side-bar">
            <ul>
                <li class="link-active"><a href="#">Users</a></li>
                <li><a href="#">Babysitter</a></li>
                <li><a href="#">Admin</a></li>
                <li><a href="#">Blocked User</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </div>
        <div class="main-area">
            <table class="table">
    <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Date of Birth</th>
    </tr>
    <?php
            // generate all job post using php 
            while( $rows = mysqli_fetch_array( $results ) ) {
                extract($rows);
    ?>
        <tr>
            <td><?php echo "$client_id"?></td>
            <td><?php echo "$name"?></td>
            <td><?php echo "$address"?></td>
            <td><?php echo "$phone_nmbr"?></td>
            <td><?php echo "$DOB"?></td>
        </tr>

    
    <?php } ?>
    </table>
        </div>
    </div>

</body>
</html>