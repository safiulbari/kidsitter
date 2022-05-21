<?php
require_once('./../db_config.php');
session_start();

if (!isset($_SESSION['user']) &&  empty($_SESSION['user'])) {
  redirect("./../login/login.php", NULL);
} else {
  $alert = '?alert=danger';
  $username = $_SESSION['user'];

  $retObj = $pdo->query("SELECT * FROM baby_sitter where username = '$username'");
  $profile = $retObj->fetch(PDO::FETCH_ASSOC);

  $experience = $profile['experience'];
  $expected_salary = $profile['expected_salary'];
  $email = $profile['email'];
  $phone = $profile['phone'];
  $location = $profile['address'];

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
  <br>
    <div class="body-area">



        <?php
        if (isset($_GET['alert']) && !empty($_GET['alert'])) {
          if ($_GET['alert'] == 'danger') {
            $msg = 'Something went wrong! Please try again. Make sure you enter valid inputs.';
          } else {
            $msg = 'Your profile has been updated';
          }
        ?>
          <div class="alert mt-2 text-center alert-<?php echo $_GET['alert'] ?>" role="alert">
            <?php echo $msg ?>
          </div>
        <?php
        }
        ?>
        <h1 class="text-center title mt-3">Update Profile</h1>
        <div class="container-sm">
          <!-- Input divs -->
          <form action="./update_profile.php" autocomplete="off" method="post" enctype="multipart/form-data">
            <div class="row g-3 mt-3">
              <!-- username -->
              <div class="col-md-12">
                <label for="username" class="form-label">@Username</label>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" value="<?php echo $username ?>" readonly>
              </div>

              <!-- Email -->
              <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
              </div>
              <!-- phone -->
              <div class="col-md-6">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" value="<?php echo $phone ?>">
              </div>

              <!-- Adress and City -->
              <div class="col-6">
                <label for="addr" class="form-label">Address</label>
                <input type="text" class="form-control" id="addr" name="addr" placeholder="House, Road, Street, Area" value="<?php echo $location ?>">
              </div>

              <!-- all 3 pass -->
              <div class="col-md-6">
                <label for="newPass" class="form-label">New Password</label>
                <input type="password" class="form-control" autocomplete="off" id="newPass" name="newPass">
              </div>
              <div class="col-md-6">
                <label for="newPass1" class="form-label">Confirm New Password</label>
                <input type="password" class="form-control" autocomplete="off" id="newPass1" name="newPass1">
              </div>
              <div class="col-md-12">
                <label for="curPass" class="form-label">Currnet Password*</label>
                <input type="password" class="form-control" autocomplete="off" id="curPass" name="curPass" required>
              </div>

              <div class="col-6">
                <label for="addr" class="form-label">Experience</label>
                <input type="text" class="form-control" id="exp" name="exp" value="<?php echo $experience ?>">
              </div>

              <div class="col-6">
                <label for="addr" class="form-label">Expected Salary</label>
                <input type="text" class="form-control" id="exs" name="exs" value="<?php echo $expected_salary ?>">
              </div>
              <!-- New DP -->

              <div class="col-12 text-center mt-5">
                <p class="btn btn-secondary px-5 py-2 mt-3"><a href="./../profile/">Cancel</a></p>
                <button type="submit" class="btn btn-primary px-5 py-2">Confirm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>

    <footer>
      <div class="container mt-5">
        <h5 class="text-center footer">© Kid Sitter</h5>
      </div>
    </footer>

  </body>

  </html>


  <!-- All the validation and processing -->
<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u_email = $_POST['email'];
    $u_phone = $_POST['phone'];
    $u_addr = $_POST['addr'];
    $curPass = $_POST['curPass'];
    $exp = $_POST['exp'];
    $exs = $_POST['exs'];

    $alert = '?alert=danger';

    if (
      isset($_POST['newPass']) && isset($_POST['newPass1']) &&
      !empty($_POST['newPass']) && !empty($_POST['newPass1'])
    ) {
      $newPass = $_POST['newPass'];
      $newPass1 = $_POST['newPass1'];
      $flag = false;
      if ($newPass === $newPass1) {
        $flag = true;
      }
    }

    if (
      isset($_POST['email']) && isset($_POST['curPass']) &&
      !empty($_POST['email']) && !empty($_POST['email']) // other fields can be NULL
    ) {
      if ($profile['password'] == md5($curPass)) {
        // all operations here
        $sql_query =
          "UPDATE baby_sitter
          SET experience = '$exp', expected_salary = '$exs',email = '$u_email',phone = '$u_phone', address = '$u_addr' WHERE username = '$username'";

        if ($flag) {
          try {
            $np = md5($newPass);
            $pdo->exec("UPDATE baby_sitter SET password = '$np' WHERE username = '$username'");
          } catch (PDOException $e) {
            $alert = '?alert=danger';
            redirect("./update_profile.php", $alert);
          }
        }
        try {
            $pdo->exec($sql_query);
            $alert = '?alert=success';
            redirect("./", $alert);
        } catch (PDOException $e) {
          $alert = '?alert=danger';
          redirect("./update_profile.php", $alert);
        }
      } else {
        $alert = '?alert=danger';
        redirect("./update_profile.php", $alert);
      }
    } else {
      $alert = '?alert=danger';
      redirect("./update_profile.php", $alert);
    }
  }
}
?>

<?php
function redirect($to, $alert)
{
?>
  <script>
    location.assign("<?php echo $to . $alert ?>");
  </script>
<?php
}
?>