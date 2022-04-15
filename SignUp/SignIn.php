<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>SignIn</title>
    </head>
    
    <body>
        <h4>SignIn</h4>
        <form action="loginprocess.php" method="POST">
            <label for="myemail">Email</label>:
            <input type="email" id="myemail" name="myemail" placeholder="x@gmail.com">
            <br>
            <label for="mypass">Password</label>:
            <input type="password" id="mypass" name="mypass">
            <br>
            <input type="submit" value="Click to SignIn">
        </form>
    </body>
</html>
