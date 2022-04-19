<?php
   $client_id = 2;

    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
    or die("Can not connect");
        ?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Profile Page</title>

<link rel="stylesheet" href="style/style_prof.css">
</head>
<body>
<br>
<br>
<br>
<br>
<center>
   <?php
      $role = 'client';
   ?>
    

   <div class="box">
   <form action="pupdate.php"  method="post" >

         
         
         <?php
         if($role == 'client') : ?>
            <input type="text" placeholder="First Name" name="first_name" ><br>
            <input type="text" placeholder="Last Name" name="last_name" ><br>
            <input type="text" placeholder=" User name" name="username" ><br>

            <input type="number" placeholder="Phone Number" name="num" ><br>
            <input type="text" placeholder="Division" name="divs" ><br>
            <input type="text" placeholder="District" name="dist" ><br>
            <input type="date" placeholder="placeholder="date of birth" name="dob"><br><br>
         <?php endif ?>

         <input type="submit" class="btn" name ="save" value="SAVE"style="float: center;margin: 10px 0 0 18.2%;" >
      </form>
   </div>
</center>



</body>
</html>