

<?php
session_start();
//connect to database

$db=mysqli_connect('localhost','root','usbw','authentication');
if(isset($_POST['login_btn']))
{
    $username=mysql_real_escape_string($_POST['username']);
    $password=mysql_real_escape_string($_POST['password']);
    $password=md5($password); 
	
    $sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result=mysqli_query($db,$sql);
    if(mysqli_num_rows($result)==1)
    {
        $_SESSION['message']="You are now Loggged In";
        $_SESSION['username']=$username;
        header("location:home.php");
    }
   else
   {
                $_SESSION['message']="Username or Password incorrect";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Login to stock exchange</title>
 <link rel="stylesheet" style type="text/css" href="style.css" >

</head>
<body>
 <div class="header">
 <h2>Login</h2>
 </div>
 <?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
  <form method="post" action="login.php">
  <table>
  <tr>
       <td>Username : </td>
           <td><input type="text" name="username" class="textInput"></td>
     </tr>
      <tr>
           <td>Password : </td>
           <td><input type="password" name="password" class="textInput"></td>
     </tr>
      <tr>
           <td></td>
           <td><input type="submit" name="login_btn" value="Login" class="Log In"></td>
      </tr>
      </table>
   </form>
 
</body>
</html>