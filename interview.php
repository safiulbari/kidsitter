<?php
    $client_id = 2;

    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
		or die("Can not connect");


    $results = mysqli_query( $connect, "SELECT * FROM interviews where status is NULL")
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
        margin: 0 50px;
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
        background-color: #04AA6D;
        color: white;
        }

        .profile_view_section{
            display: none;
            margin: 20px;
            border: 2px solid #000;
            padding: 20px;
        }
        button {
            padding: 6px 10px;
            cursor: pointer;
        }
        #hire{
            color: white;
            background: #04AA6D;
            border: none;
            border-radius: 2px;

        }
        #reject{
            background: white;
            border: none;
            color: black;
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
            <a class="link flex-center link-active" href="#">Interviews</a>
            <a class="link flex-center" href="./mybabysitter.php">My BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center">My Profile</a>
        </div>
    </div>
    <br>

    <table class="table">
    <tr>
        <th>Interview Date</th>
        <th>Time</th>
        <th>Meet Link</th>
        <th>Status</th>
    </tr>
    <?php
            // generate all job post using php 
            while( $rows = mysqli_fetch_array( $results ) ) {
                extract($rows);
    ?>
        <tr>
            <td><?php echo "$date <span style='display:none' id='interview_id'>$interview_no</span>";?></td>
            <td><?php echo "$time"?></td>
            <td><?php echo "<a href='$link' target='_blank'>Interview Link<a>"?></td>
            
            <td>
                <button id="hire">Hire</button>
                <button id="reject">Reject</button>
            </td>
        </tr>

    
    <?php } ?>
    </table>

    <div class="modal"></div>

    <script>
        const hire = document.querySelector("#hire");
        const reject = document.querySelector("#reject");

        hire.addEventListener('click', function() {
            let interview_id = document.querySelector("#interview_id");
            let id = interview_id.innerHTML;

            fetch('./interview_backend.php?interview_no='+id)
                .then(response => response.json())
                .then(myObj => {
                    
                });
        });

        reject.addEventListener('click', function() {
            let interview_id = document.querySelector("#interview_id");
            let id = interview_id.innerHTML;

            setTimeout("location.reload(true);",1500)

            fetch('./interview_backend2.php?interview_no='+id)
                .then(response => response.json())
                .then(myObj => {});
            
        });
    </script>