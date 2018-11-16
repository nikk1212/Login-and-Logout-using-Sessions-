<?php
require 'connect.inc.php';
if(isset($_POST['username'])&&isset($_POST['password'])&&isset($_POST['firstname'])&&isset($_POST['lastname']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$hashpass=md5($password);
	if(!empty($username)&&!empty($password)&&!empty($firstname)&&!empty($lastname))
	{
		$query="select username from user where username='$username'";
		$queryrun=mysqli_query($conn,$query);
		$row_count=mysqli_num_rows($queryrun);
		if($row_count!=0)
		{
			echo "<script> alert('user already exists') </script>";
		}
		else
		{
			$sql="insert into user value(null,'$username','$hashpass','$firstname','$lastname')";
			if (mysqli_query($conn, $sql)) {
    			echo "New record created successfully";
			} 
			else {
    			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		}
	}
	else
	{
		echo "<script> alert('Please fill all the fields') </script>";
	}
}

?>

<form action="register.php" method="POST">
	UserName: <input type='text' name='username' placeholder='username' required><br><br>
	Password: <input type='password' name='password' placeholder='password' required><br><br>
	FirstName: <input type='firstname' name='firstname' placeholder='firstname' required><br><br>
	LastName: <input type='lastname' name='lastname' placeholder='lastname' required><br><br>
	<input type="submit" value="Submit">

</form>
<button onclick="window.open('login.php');">Login</button>