<?php  
require 'connect.inc.php';
session_start();
?>  


<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];
     $password_hash=md5($pass);
     $query="select id from user where username='$user' and password='$password_hash'";
     $query_run=mysqli_query($conn,$query);
     $query_num_rows=mysqli_num_rows($query_run);


      if($query_num_rows==1)  
         {                                        


          $_SESSION['use']=$user;


         echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            //  On Successful Login redirects to home.php

        }

        else
        {
            echo "invalid UserName or Password";
        }
}
 ?>
<html>
<head>

<title> Login Page   </title>


</head>

<body>

<form action="" method="post">

    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
    <td><button onclick="register()" style="height: 26px;

width: 72px;

position: relative;

left: -110px;">Register</button></td>
    </tr>
</table>
</form>
<script type="text/javascript">
  
  function register()
  {
     var myWindow=window.open("register.php");
     
  }
</script>

</body>
</html>