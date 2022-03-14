<?php 
    session_start();
    include 'header.php';
    include '../PostRepo.php';
    $post = new PostRepo();
    $info = $post->postByIdPost($_GET['id']);
?>

	
	<div id="contents">
		<div class="post">
			<div class="date">
				<p>
					<span><?php echo $info['month'] ?></span>
					<?php echo $info['year'] ?>
				</p>
			</div>
			<h1><?php echo $info['title'] ?> <span class="author"><?php echo $info['name'] ?></span></h1>
			<p>
                <?php echo $info['content'] ?>
			</p>
			<span><a href="news.php" class="more">Back to News</a></span>
		</div>
	</div>
	<div id="footer">
		<div class="clearfix">
			<div id="connect">
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a><a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a><a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a><a href="http://www.freewebsitetemplates.com/misc/contact/" target="_blank" class="tumbler"></a>
			</div>
			<p>
				© 2023 Zerotype. All Rights Reserved.
			</p>
		</div>
	</div>
