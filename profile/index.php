<?php
require_once('./../db_config.php');
session_start();
if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
?>
  <script>
    location.assign("./../login/login.php");
  </script>
<?php
} else {

  $username = $_SESSION['user'];

  $retObj = $pdo->query("SELECT * FROM baby_sitter where username = '$username'");

  $profile = $retObj->fetch(PDO::FETCH_ASSOC);
  $experience = $profile['experience'];
  $expected_salary = $profile['expected_salary'];
  $email = $profile['email'];
  $phone = $profile['phone'];
  $location = $profile['address'];

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
        <li class="main-nav__item nav-logout"><a href="..\logout\logout.php">logout</a></li>
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
  <br>
    <div class="body-area">

    <!-- Main -->
    <main>
      <div class="container">
        <div class="row g-2 mt-3 ">
          <div class="col-md-4 text-center">
            <div class="profile-name">
              <p class="username">User Name: <?php echo $username; ?> </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card mb-3 rounded border">
              <h1 class="text-center title">My Information</h1>
            </div>
            <div class="card p-3">
              <div class="row g-2">
                <div class="col-md-3 info-card px-3">
                  <p class="info-name">Email :</p>
                  <p class="info-name">Phone :</p>
                  <p class="info-name">Address :</p>
                  <p class="info-name">Experience :</p>
                  <p class="info-name">Expected Salary:</p>
                </div>
                <div class="col-md-9 info-detail px-5">
                  <p class="info-detail"><?php echo $email; ?></p>
                  <p class="info-detail"><?php echo $phone; ?></p>
                  <p class="info-detail"><?php echo $location; ?></p>
                  <p class="info-detail"><?php echo $experience; ?></p>
                  <p class="info-detail"><?php echo $expected_salary; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <a href="./update_profile.php"><button class="btn btn-primary" style="margin-left: 50%">Update Profile</button></a>
    </main>

    <!-- Footer -->
    <footer>
    </footer>

  </body>

  </html>
<?php
}
?>