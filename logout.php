<?php

session_start();
if(
        isset($_SESSION['useremail'])
    &&  !empty($_SESSION['useremail'])
){
    unset($_SESSION['useremail']);
    session_destroy();
    
    ?>
        <script>location.assign("SignIn.php");</script>
    <?php 
    
}
else{
    ?>
        <script>location.assign("SignIn.php");</script>
    <?php 
}

?>