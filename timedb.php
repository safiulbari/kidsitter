<?php
require_once('dbconfig.php');
$connect = mysqli_connect(HOST, USER, PASS, DB)
    or die("Can not connect");
if (isset($_POST['done'])) {

    if (empty($_POST['datee']) || empty($_POST['timee']) || empty($_POST['link'])) {
        echo "Fill all the fields !!!!";
        header("Location:settime.php?msg=Fill all the fields !!!!");
    }

    $date = date('Y-m-d', strtotime($_POST['datee']));
    $time = date('h:i', strtotime($_POST['timee']));
    $link =  $_POST['link'];


    mysqli_query($connect, "INSERT INTO interview (sitter_id, job_id, timee, datee, link)
     VALUES(1, 10, '$time', '$date', '$link')")
        or die("cant execute query");
    echo "<p>Interview Information Sent to the babySitter</p>";
}
