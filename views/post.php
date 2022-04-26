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
			<h1><?php echo $info['title'] ?> <span class="author"><?php echo $info['username'] ?></span></h1>
			<p>
                <?php echo $info['content'] ?>
			</p>
			<span><a href="news.php" class="more">Back to News</a></span>
		</div>
	</div>