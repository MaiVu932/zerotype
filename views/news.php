<?php 
    session_start();
    include 'header.php';
    include '../PostRepo.php';
    $post = new PostRepo();
?>

	
	<div id="contents">
		<div class="main">
			<h1>News</h1>
			<ul class="news">

                <?php foreach($post->posts() as $post): ?>

                    <li>
                        <div class="date">
                            <p>
                                <span><?php echo $post['month'] ?> </span>
                                <?php echo $post['year'] ?>
                            </p>
                        </div>
                        <h2><?php echo $post['title'] ?><span><?php echo $post['name'] ?></span></h2>
                        <p>
                            <?php echo $post['description'] ?>
                            <span><a href="post.php?id=<?php echo $post['id'] ?>" class="more">Read More</a></span>
                        </p>
                    </li>

				<?php endforeach; ?>
			</ul>
		</div>
		<div class="sidebar">
			<h1>Popular Posts</h1>
			<ul class="posts">
				<li>
					<h4 class="title"><a href="post.php">Making It Work</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
				<li>
					<h4 class="title"><a href="post.php">Designs and Concepts</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
				<li>
					<h4 class="title"><a href="post.php">Getting It Done!</a></h4>
					<p>
						I'm a paragraph. Click here to add your own text and edit me. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
				</li>
			</ul>
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