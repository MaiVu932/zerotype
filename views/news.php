<?php 
    session_start();
    include 'header.php';
    include '../PostRepo.php';
    $post = new PostRepo();
    $categories = $post->categoris();
    $pages = count($post->posts());
?>

	
	<div id="contents">
		<div class="main">
			<h1>News</h1>
			<ul class="news">
                <?php if(!count($post->postPage())): ?>
                    <p>No content</p>
                <?php endif; ?>
                <?php foreach($post->postPage() as $post): ?>

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
                            <?php echo substr($post['content'], 0, 150) . ' ...'; ?>
                            <span><a href="post.php?id=<?php echo $post['id'] ?>" class="more">Read More</a></span>
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
                            <a href="?category-id=<?php echo $category['id'] . (isset($_GET['page']) ? ('&page=' . $_GET['page']) : ''); ?>"><?php echo $category['name'] ?></a>
                        </li>
                    <?php endforeach; ?>
                
			</ul>
		</div>

       
	</div>
    <ul style="display: flex; list-style-type: none;">
			<?php for($i=0; $i<= ceil($pages) / 5; $i++): ?>
				<li style="margin-left: 16px;"><a href="?page=<?php echo $i+1 . (isset($_GET['category-id']) ? ('&category-id=' . $_GET['category-id']) : '') ; ?>"><?php echo $i+1; ?></a></li>
			<?php endfor; ?>
		</ul>
	

    <?php include 'footer.php' ?>