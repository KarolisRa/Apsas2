<html>
<head>
<meta name="viewport" content ="initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="css/ratchet.min.css" rel="stylesheet">
<link rel="StyleSheet" href="css/style2.css" title="Contemporary">
<script src="ratchet.min.js"></script>
<style> 
body {
    background: url("img/bg.jpg");
    background-size: 100% 1000px;
    background-repeat: no-repeat;
}
</style>
</head>
<body>
<center><img src="img/example_logo.png" alt="Logo" style="width:250px;height:170px;"></center>
<form method="POST" action="">
  <input type="email" name="email" placeholder="E-mail address">
  <input type="password" name="password" placeholder="Password">
<div><input type="submit" name="login" value="Login" class="btn btn-positive btn-block"></div>
</form>
<a href="register.php">New member? Register here</a>
</body>
</html>

<?php
 
include("Db_conection.php");
 
if(isset($_POST['login']))
{
    $user_email=$_POST['email'];
    $user_pass=$_POST['password'];
 
    $check_user="select * from users WHERE user_email='$user_email'AND user_pass='$user_pass'";
 
    $run=mysqli_query($dbcon,$check_user);
 
    if(mysqli_num_rows($run))
    {
        echo "<script>window.open('Meniu.php','_self')</script>";
 
        $_SESSION['email']=$user_email;//here session is used and value of $user_email store in $_SESSION.
 
    }
    else
    {
        echo "<script>alert('Email or password is incorrect!')</script>";
    }
}
?>