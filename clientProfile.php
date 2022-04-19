<?php
   $client_id = 2;

    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB )
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
            <a class="link flex-center" href="http://localhost/kidSitter/kidsitter/clientProfile.php">My Profile</a>
        </div>
    </div>

</head>
<body style="background-color: white;">
    <div class="container">
     <div class="wrapper">
         <?php
         //  $role =$_SESSION['Role'];  
           //$mail =$_SESSION['usermail'];
           //$uid = $_SESSION['ID'];
         ?>
         <h2 style="text-align: center;">My profile</h2>
         <?php
             
         ?>
         <div style="text-align: center;"><b >Welcome</b>
            <h4>

                <?php
               
                $sql = "SELECT * FROM users WHERE email ='afrin@gmail.com'";
                $result = mysqli_query($connect , $sql);
                $count = mysqli_num_rows($result);
                if($count > 0){
                    $row = mysqli_fetch_assoc($result);
                    echo $row['first_name']."<br>";
                } 
                ?>
            
            </h4></div>
           
           <table >  
                    <tr>
                      <td>
                        <b>User ID:</b>
                     </td>            
                     <td>
                        <?php echo $row['user_id']."<br>"; ?>
                     </td>
                   </tr>


                   <tr>
                      <td>
                        <b>First Name:</b>
                     </td>            
                     <td>
                        <?php echo $row['first_name']."<br>"; ?>
                     </td>
                   </tr>

                  <tr>
                     <td>
                        <b>Last Name:</b>
                     </td>            
                     <td>
                      <?php echo $row['last_name']."<br>"; ?>
                      </td>
                  </tr>
                   
                  <tr>
                    <td>
                        <b>Email:</b>
                      </td>             
                      <td>
                        <?php echo $row['email']; ?>
                      </td>
                  </tr>
                
                 <?php
   
                $sql = "SELECT * FROM clients WHERE user_id ='9'";
                    $result = mysqli_query($connect , $sql);
                    $count = mysqli_num_rows($result);
                    if($count > 0){
                        $row = mysqli_fetch_assoc($result);   
                    }   
               ?>
                    <tr>
                      <td>
                        <b>Location:</b>
                      </td>            
                      <td>
                        <?php 

                        echo $row['district'] ." , ". $row['division'];
                        ?>
                      </td>
                    </tr>
              

                    <tr>
                      <td>
                        <b>Phone number:</b>
                      </td>            
                      <td>
                        <?php echo $row['phone_nmbr'] ; ?>
                      </td>
                    </tr>

                    <tr>
                      <td>
                        <b>Date Of Birth:</b>
                      </td>            
                      <td>
                        <?php echo $row['DOB'] ; ?>
                      </td>
                    </tr>
              
            </table>
            <form action="editprof.php"  method="post">
                <button class="btn btn-default" style="float:center;" name=submit1>Edit </button>
           </form> 
          
        </div>
    </div>

    </div>
    
</body>
</html>