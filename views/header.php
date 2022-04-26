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
					<a href="news.php">Home</a>
				</li>
				
				
				
                    <?php if(!isset($_SESSION['user'])): ?>
                        <li>  <a href="login.php">Login/</a>
                        <a href="register.php">Register</a>
                    </li>
                    <li>
				</li>
                        <?php else: ?>
                       
                        <?php if($_SESSION['user'][0]['permission'] == 1) : ?>
                            <li>
                                <a href="category.php">Categories</a>
                            </li>
                            <li>
                                <a href="approves.php">Approves</a>
                            </li>
                            
                        <?php else: ?>
                            <li>
                                <a href="post_list.php">Posts</a>
                            </li>
                        <?php endif ?>
                        <li> <img style="width: 40px; height: 40px; border-radius:20px;" src="../images/avata/<?php echo $_SESSION['user'][0]['image'] ?>" />
                        <a href="user_update.php"><?php echo $_SESSION['user'][0]['username'] ?>/</a>
                        <a href="user_logout.php">Logout</a>
                        </li>

                        <?php endif ?>
                <!-- <li>
					<a href="register.php">Register</a>
				</li> -->
               
			</ul>
		</div>
	</div>