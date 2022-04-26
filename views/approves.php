<?php include 'header.php' ?>
<?php
    include '../PostRepo.php';
    $post = new PostRepo();
    $categories = $post->categoris();
    $post->validate();
    // $posts = $post->postNoApproves();
?>


<div id="contents">
		<div class="main">
			<h1>List of new articles that need approval</h1>
			<ul class="news">
                <?php if(!count($post->postNoApproves())): ?>
                    <p>No content</p>
                <?php endif; ?>
                <?php foreach($post->postNoApproves() as $post): ?>

                    <li>
                        <div class="date">
                            <p>
                                <span><?php echo $post['month'] ?> </span>
                                <?php echo $post['year'] ?>
                            </p>
                        </div>
                        <h2><?php echo $post['title'] ?></h2>
                        <span><?php echo $post['username'] ?></span>
                        <p>
                            <?php if(isset($_GET['id']) && $_GET['id'] == $post['id']): ?>
                                <?php echo $post['content'] ?>
                            <?php else: ?>
                                <?php echo substr($post['content'], 0, 150) . ' ...'; ?>
                            <?php endif; ?>
                            
                            <span><a href="?id=<?php echo $post['id'] ?>" class="more">Read More</a></span>
                            <span><a href="approves_agree.php?id=<?php echo $post['id'] ?>" class="more">Agree</a></span>
                            <span><a href="approves_deny.php?id=<?php echo $post['id'] ?>" class="more">Deny</a></span>
                        
                        </p>
                    </li>

				<?php endforeach; ?>
			</ul>
		</div>
		<div class="sidebar">
			<h1>Categories</h1>
			<ul style="list-style-type: circle">
				
                    <?php foreach($categories as $category): ?>
                        <li>
                            <a href="?category-id=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                
			</ul>
		</div>
	</div>


<?php include 'footer.php' ?>
