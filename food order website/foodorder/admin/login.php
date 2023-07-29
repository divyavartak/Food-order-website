 <?php include('../config/constants.php'); ?>

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
    <div class="login">
        <h1 style="color:white;text-align:center">Login</h1><br><br>
        
        <?php 
        /*    if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['no-login-message']))
            {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?><br><br>

        <!-- Login starts here -->
        <form action="" method="POST" style="color:white" class="text-center">
            Username : <br><br>
            <input type="text" name="username" placeholder="Enter Username"><br><br>

            Password : <br><br>
            <input type="password" name="password" placeholder="Enter Password"><br><br>

            <input type="submit" name="submit" value="Login" class="btn-primary">
        </form>
        <!-- Login ends here -->
</html>

<?php

    //check submit button is clicked or not
    if(isset($_POST['submit']))
    {
        //1. get the data from login form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2. sql to check whether the user with uname and pass exist or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3.execte the query
        $res = mysqli_query($conn, $sql);

        //4. count rows to check whether the user exsits or not
        $count = mysqli_num_rows($res);

        if($count==1)
        {
            //login success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username;

            //redirect to homepage or dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //login failed
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //redirect to homepage or dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }

*/
?> 