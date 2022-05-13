<?php
    $client_id = 2;

    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


    $results = mysqli_query( $connect, "SELECT * FROM interviews INNER JOIN sitter ON interviews.sitter_id = sitter.sitter_id  where interviews.client_id = $client_id AND interviews.status=1")
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
    <style>
        .table {
        margin: 0 20jpx;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        padding:0 20px;
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
        background-color: #04AA6D;
        color: white;
        }
    </style>
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
            <a class="link flex-center" href="./home.php">Jobs</a>
            <a class="link flex-center" href="#">Interviews</a>
            <a class="link link-active flex-center" href="#">My BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center">My Profile</a>
        </div>
    </div>
    <br>

    <table class="table">
    <?php
            // generate all job post using php 
            while( $rows = mysqli_fetch_array( $results ) ) {
                extract($rows);
    ?>
        <tr>
            <td><?php echo "$sitter_name";?></td>
            <td><?php echo "$phone_nmbr"?></td>
            <td>
                <button>View Profile</button>
            </td>
        </tr>

    </table>
    <?php } ?>