<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    if(   isset($_POST['myemail']) 
       && isset($_POST['mypass'])
       && !empty($_POST['myemail'])
       && !empty($_POST['mypass'])
    ){
        $email=$_POST['myemail'];
        $pass=$_POST['mypass'];
        
        
        try{
     
            $conn=new PDO("mysql:host=localhost:3306;dbname=kidSitter;","root","");
           
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            
            $enc_password=md5($pass);
            
          
            $signupquery="insert into admin values('$email','$enc_password')";
            
            
            $conn->exec($signupquery);
            
            ?>
                <script>location.assign("SignInadmin.php");</script>
            <?php
        }
        catch(PDOException $ex){
            ?>
                <script>location.assign("SignUp.php");</script>
            <?php
        }
        
    }
    else{
       
    ?>
        <script>location.assign("SignUp.php");</script>
    <?php
        
    } 
}
else{
    
    echo '<script>location.assign("SignUp.php");</script>';
}


?>
