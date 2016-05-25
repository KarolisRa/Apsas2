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
  <input name="name" type="text" placeholder="First Name">
  <input name="lastname" type="text" placeholder="Last Name">
  <input name="email" type="email" placeholder="Email">
  <input name="password" type="password" placeholder="Password">
  <div><input type="submit" name="submit" value="Register" class="btn btn-positive btn-block"></div>
</form>
</body>
</html>

<?php  
  
include("Db_conection.php");//make connection here  
if(isset($_POST['submit']))  
{  
    $first_name=$_POST['name'];//here getting result from the post array after submitting the form.  
    $last_name=$_POST['lastname'];
	$user_email=$_POST['email'];//same  
    $user_pass=$_POST['password'];//same  
  
  
    if($first_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the First Name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
	    if($last_name=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the Last Name')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the Email')</script>";  
exit();  
    }  
  
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the Password')</script>";  
    exit();  
    }  
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from users WHERE user_email='$user_email'";  
    $run_query=mysqli_query($dbcon,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $user_email is already exist in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into users (first_name,last_name,user_email,user_pass) VALUES ('$first_name','$last_name','$user_email','$user_pass')";  
    if(mysqli_query($dbcon,$insert_user))  
    {  
        echo"<script>window.open('login.php','_self')</script>";  
    }  
  
}  
  
?>