<?php   require 'connect.inc.php';
session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login.php");  
       }
       else
       {
       $userid=$_SESSION['use'];
       $query="select firstname from user where username='$userid'";
       if($query_run=mysqli_query($conn,$query))
       {
          $row=mysqli_fetch_assoc($query_run);
          $username=$row['firstname'];
            

       }
       else
       {
        echo "abc";
       }  
          echo "Welcome ".$username."<br>";

          echo "Login Success"."<br>";

          echo "<a href='logout.php'> Logout</a> "; 
        }
?>
</body>
</html>