<?php
require_once('dbconfig.php');
$connect = mysqli_connect(HOST, USER, PASS, DB)
    or die("Can not connect");
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
            <a class="link flex-center" href="#">BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center" href="#">My Profile</a>
        </div>
    </div>
    <div class="body-area">
        <form action="timedb.php" method="post">
            <div class="row">
                <?php echo isset($_GET['msg']) ? '<p style="margin-bottom: 20px; color: red">' . $_GET['msg'] . '</p>' : ''; ?>

                <div class="mb-3">
                    Interview Date:<br>
                    <input type="date" class="form-control" name="datee">
                </div>
                <div class="mb-3">
                    Interview start :<br>
                    <input type="time" class="form-control" name="timee">
                </div>
                <div class="mb-3">
                    Goolge Link :<br>
                    <input type="text" class="form-control" name="link">
                </div>

                <button type="submit" name="done">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>