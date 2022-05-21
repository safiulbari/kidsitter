<?php
error_reporting(0);

require_once('dbconfig.php');
$connect = mysqli_connect(HOST, USER, PASS, DB)
    or die("Can not connect");

$status = 'OK';
$content = [];
$content2 = [];

if (mysqli_connect_errno()) {
    $status = 'ERROR';
    $content = mysqli_connect_error();
}

//$query = "SELECT *
//     FROM users WHERE role='sitter'";

//if ($result = mysqli_query($connect, $query)) {
/* fetch associative array */
// while ($row = mysqli_fetch_assoc($result)) {
//    $content[] = $row; // push value to array
// }
//}

$status = 'OK';
$content = [];
$sql = "SELECT *
                        FROM users WHERE role='sitter'";
$result = mysqli_query($connect, $sql);

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($row as $key => $row) {

    //$content[] = $row;

    $u_id = $row['user_id'];



    $sql = "SELECT *
                        FROM sitter
                        WHERE user_id=(SELECT user_id
                        FROM users
                        WHERE user_id = $u_id)";

    $result = mysqli_query($connect, $sql);
    $Jrow = mysqli_fetch_assoc($result);

    // echo $Jrow['phone_nmbr'];

    $content[] = array('users' => $row, 'sitter' => $Jrow);

    // $content[0] = $row;
    // $content[0] = $Jrow; // push value to array

}

$data = ["status" => $status, "content" => $content];

header('Content-type: application/json');
echo json_encode($data);
