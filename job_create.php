<!-- create job php -->
<?php
$client_id = $_GET["client_id"];
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
            <a class="link flex-center" href="#">My Profile</a>
        </div>
    </div>

    <!-- <div class="body-area"></div> -->
    <div class="body-area">
    <form method=get action=job_create_result.php>
    
        <input type=hidden name=client_id value='<?php echo $client_id; ?>'> <br>

        Title:<br> 
        <input type=text name=title> <br>

        Details:<br>
        <textarea type=text name=details> </textarea><br>
        
        Relationship with Kid:<br>
        <input type=text name=R_with_client> <br>
        
        Kid Age:<br>
        <input type=text name=kid_age> <br>

        Salary Range:<br>
        <input type=text name=salary_range> <br>
        
        Address:<br>
        <input type=text name=address> <br>
        Work Days/weekly:<br>
        <input type=text name=job_day> <br>

	<input class="submit" type=submit value=Create>
    </form>

</div>
</body>
</html>
   