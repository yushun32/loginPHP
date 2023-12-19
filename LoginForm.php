<?php
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'lab9') or die ('Unable to connect');
	
?>

<DOCTYPE html>
<html>
<head>
<style>
body{  
    border: solid black 3px;  
	text-align:center;
	width: 15%;	
	padding: 10px;
	margin: 300px auto;
}  

  .sbtButton {
    padding: 20px;
    float: left;
    width: 20%;
  }
  
   .rstButton {
    padding: 20px;
    float: right;
	width: 20%;
  }
  
</style>
</head>

<body>
	<h3>Enter Login Details</h3>
	<form action="LoginForm.php" method="post">
	
	
		<label>Username:</label><br>
		<input type="text" class="field" name="user_name" placeholder="username" required=""><br/>
		
		<label>Password:</label><br>
		<input type="password" class="field" name="password" placeholder="password" required=""><br/>
		
		
		
		<div class="sbtButton"><input type="submit" class="field" name="submit" value="Submit"></div>
		<div class="rstButton"><input type="reset" class="field" name="reset" value="Reset"></div>
	</form>
	
	<?php
	if(isset($_POST['submit'])){
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
		
		$select = mysqli_query($conn, "SELECT * FROM user_login WHERE user_name = '$user_name' AND password = '$password' ");
		$row = mysqli_fetch_array($select);
		
		if(is_array($row)) {
			$_SESSION["user_name"]=$row['user_name'];
			$_SESSION["password"]=$row['password'];
		} else {
			echo '<script type="text/javascript">';
			echo 'alert("Invalid username and password");';
			echo 'window.location.href="LoginForm.php"';
			echo '</script>';
		}
	}
	if(isset($_SESSION["user_name"])){
		header("Location:welcomeUser.php");
	}
?>

	
</body>
</html>
