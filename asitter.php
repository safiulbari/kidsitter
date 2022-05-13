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



        <?php
        $job_id = $_GET["job_id"];

        echo "<a href='home.php'> < Back to jobs</a>";

        require_once('dbconfig.php');
        $connect = mysqli_connect(HOST, USER, PASS, DB)
            or die("Can not connect");
        $status = 'OK';
        $content = [];


        $results = mysqli_query($connect, "SELECT * FROM jobs where job_id = $job_id")
            or die("Can not execute query");

        while ($rows = mysqli_fetch_array($results)) {
            extract($rows);
            echo "<h2 class='title'>$title</h2><br>";
            echo "<p>Details: $details</p><br>";
            echo "<p>Salary Range: $salary_range Tk</p><br>";
            echo "<p>Relationship with you: $R_with_client</p><br>";
            echo "<p>Location: $address</p><br>";
            echo "<p>Kid age: $kid_age years</p><br>";
        }



        ?>
        <?php
        echo nl2br("\nApplied Sitter\n\n ");



        $sql = "SELECT * FROM applicants WHERE job_id = $job_id";
        $result = mysqli_query($connect, $sql);
        //if ($result = mysqli_query($connect, $sql)) {
        /* fetch associative array 
            while ($row = mysqli_fetch_assoc($result)) {
                $content[] = $row; // push value to array
            }
        }*/
        $count = mysqli_num_rows($result);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach ($rows as $row) {
            #echo $row['user_id'] . "<br>";
            //$status = 'OK';



            $c_id = $row['user_id'];

            $sql = "SELECT *
                                 FROM users
                                 WHERE user_id = $c_id";

            $result = mysqli_query($connect, $sql);
            $Jrow = mysqli_fetch_assoc($result);

            echo $Jrow['first_name'] . "<br>";
            echo $Jrow['last_name'] . "<br>";
            echo $Jrow['email'] . "<br>";
            echo nl2br("\n");
        }
        //$data = ["status" => $status, "content" => $content];

        //header('Content-type: application/json');
        //echo json_encode($data); // get all products in json format.

        ?>




    </div>
</body>