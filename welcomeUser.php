<?php
	session_start();
?>

<DOCTYPE html>
<html>
	<head>
	<style>
	</style>
	<head>
	
	<body>
		Welcome <?php echo $_SESSION['user_name'];?>.
		Click here to <a href = "logout.php">Logout.</a>
		
	</body>

</html>
