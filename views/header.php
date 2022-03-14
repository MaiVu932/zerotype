<?php 
if(!isset($_SESSION)) { 
    session_start(); 
} 
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register - Zerotype Website Template</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>


	<div id="header">
		<div>
			<div class="logo">
				<a href="index.php">Zero Type</a>
			</div>
			<ul id="navigation">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="features.php">Features</a>
				</li>
				<li>
					<a href="news.php">News</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
                    <?php if(!isset($_SESSION)): ?>
                        <a href="login.php">Login/</a>
                        <a href="register.php">Register</a>
                    <?php else: ?>
                        <a href="logout.php?state=1">Logout</a>
				    <?php endif ?>
				</li>
               
			</ul>
		</div>
	</div>