<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
    //we will process here
    
    if(   isset($_POST['myemail']) 
       && isset($_POST['mypass'])
       && !empty($_POST['myemail'])
       && !empty($_POST['mypass'])
    ){
        $email=$_POST['myemail'];
        $pass=$_POST['mypass'];
        
        
        ///store the data to database
        try{
            
            $conn=new PDO("mysql:host=localhost:3306;dbname=covid_19_e_service;","root","");
            ///setting 1 environment variable
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $enc_password=md5($pass);
            
            ///checking from the database
            $myquerystring="SELECT * FROM admin WHERE email='$email' and pass='$enc_password'";
            
            $returnobj = $conn->query($myquerystring);   ///the return objects is a PDOStatement object
            
            if($returnobj->rowCount()==1){
                
                session_start();
                $_SESSION['useremail']=$email; ///global variable
                
                
                ?>
                    <script>location.assign("home.php");</script>
                <?php
            }
            else{
                    echo "Not match";
            }
        }
        catch(PDOException $ex){
                    echo "Exception!";
        }
        
    }
    else{
        ///if email and password data is empty or not set
    ?>
        <script>location.assign("SignIn.php");</script>
    <?php
        
    } 
    
}
else{
    //we won't process
    ?>
        <script>location.assign('SignIn.php')</script>
    <?php
    
}


?>