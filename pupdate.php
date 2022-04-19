<?php
    require_once('dbconfig.php');
    $connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");

       
$role = 'client';
$uid = 9;



        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $username=$_POST['username'];

         $sql = "UPDATE users SET 
         first_name = '$first_name',
         last_name = '$last_name',
         username = '$username'
         WHERE user_id = $uid ";
        $result = mysqli_query($connect , $sql);


        if(!$result){
            die(mysqli_error($connect));            
        }



        $num = $_POST['num'];
        $divs = $_POST['divs'];
        $dist = $_POST['dist'];
        $dob = date('Y-m-d',strtotime($_POST['dob']));

        $sql= "UPDATE clients SET 
        phone_nmbr ='$num', 
        division ='$divs', 
        district ='$dist', 
        DOB ='$dob'
        WHERE user_id ='$uid'";        
        $result = mysqli_query($connect , $sql);
        
        if($result === TRUE ){
            header("Location:clientProfile.php?=successful");
        }else{
            echo "Wrong";
        }


?>