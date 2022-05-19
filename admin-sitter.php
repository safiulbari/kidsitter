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
            <a class="link link-active flex-center" href="#">View All babySitter</a>
            <a class="link flex-center" href="#"></a>
            <a class="link flex-center" href="#">BabySitter</a>
            <a class="link flex-center" href="#">Payment</a>
            <a class="link flex-center" href="#">Babyfood</a>
            <a class="link flex-center" href="#">My Profile</a>
        </div>
    </div>
    </div>
    </div>
    <div class="table_responsive">
        <table border="1">
            <thead>
                <tr>

                    <th>first name</th>
                    <th>last name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>License number</th>


                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *
                        FROM users WHERE user_id=7";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($row as $row) {
                ?>
                    <tr>

                        <td> <?php echo $row['first_name']; ?> </td>
                        <td> <?php echo $row['last_name']; ?> </td>
                        <td> <?php echo $row['email']; ?> </td>



                    </tr>
                <?php
                } ?>

            </tbody>

        </table>
    </div>

</body>

</html>