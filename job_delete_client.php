<?php
$job_id = $_GET["job_id"];
require_once('dbconfig.php');
$connect = mysqli_connect( HOST, USER, PASS, DB ) or die("Can not connect");
mysqli_query( $connect, "DELETE FROM jobs WHERE job_id=$job_id" ) or die("Can not execute query");

?>

<style>
    @import url(https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic);
    * {
        font-family: poppins;
    }
    body {
        background-color: #058FC4;
        display: flex;
        justify-content: center;    
        align-items: center;
        height: 100vh;
        flex-wrap: wrap;
        
    }
    .prompt{
        height: 400px;
        width: 400px;
        background: white;
        border-radius: 6px;
        display: flex;
        flex-direction: column;
        justify-content: center;    
        align-items: center;
        padding-bottom: 20px;

        /* drop shadow  */
        box-shadow: 0px 10px 10px -5px rgba(0, 0, 0, 0.04);

        box-shadow: 0px 20px 25px -5px rgba(0, 0, 0, 0.1);

    }
    .prompt img{
        height: 256px;

    }
</style>

<body>
    
<div class="prompt">
    <img src="./img/delete.gif" alt="">
    <h2>Job deleted</h2>
</div>
</body>

<script>
    setTimeout(function(){
            window.location.href = './home.php';
         }, 4000);
</script>