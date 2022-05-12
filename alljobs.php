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
    <title>Job List</title>
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
            <a class="link flex-center" href="http://localhost/kidSitter/kidsitter/clientProfile.php">My Profile</a>


        </div>
    </div>
    <div class="table_responsive">
        <table>
            <thead>
                <tr>
                    <th> JOB ID</th>
                    <th>Title</th>
                    <th>Posted by</th>
                    <th>Salary Range</th>
                    <th>Details</th>
                    <th>Relation with kid</th>
                    <th>Kid's age</th>
                    <th>Address</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT *
                        FROM jobs";
                $result = mysqli_query($connect, $sql);
                $count = mysqli_num_rows($result);
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($row as $row)
                ?>
                <tr>

                    <td> <?php echo $row['job_id']; ?> </td>
                    <td> <?php echo $row['title']; ?> </td>
                    <td>
                        <?php
                        $c_id = $row['client_id'];
                        $sql = "SELECT username
                        FROM users
                        WHERE user_id=(SELECT user_id
                        FROM clients
                        WHERE client_id = '$c_id')";

                        $result = mysqli_query($connect, $sql);
                        $Jrow = mysqli_fetch_assoc($result);

                        echo $Jrow['username'];
                        ?>
                    </td>
                    <td> <?php echo $row['salary_range']; ?></td>
                    <?php
                    ?>
                </tr>


            </tbody>
        </table>
    </div>
</body>

</html>