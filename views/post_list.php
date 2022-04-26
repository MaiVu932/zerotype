<?php include 'header.php' ?>
<link rel="stylesheet" href="../css/postscreate.css" />

<?php
    // include '../db.php';
    include '../PostRepo.php';
    $post = new PostRepo();
    $posts = $post->postByIdUser($_SESSION['user'][0]['id']);
    $post->validate();
?>

<div id="contents">
		<div class="main">
            <div class="title">
                <h1>Your posts</h1>
                <a href="post_create.php">Add new post</a>
            </div>
			
			<ul class="news">

                <?php foreach($posts as $post): ?>

                    <li>
                        <div class="date">
                            <p>
                                <span><?php echo $post['month'] ?> </span>
                                <?php echo $post['year'] ?>
                            </p>
                        </div>
                        <h2><?php echo $post['title'] ?></h2>
                        <p style="text-align: justify;">
                        <?php echo substr($post['content'], 0, 150) . ' ...'; ?>
                           <div class="t">
                           <span><a href="post.php?id=<?php echo $post['id'] ?>" class="more">Read More</a></span>
                            <?php if($post['status'] == 0): ?>
                                <span><a href="post_delete.php?id=<?php echo $post['id'] ?>" class="more">Delete</a></span>
                                <span><a href="post_update.php?id=<?php echo $post['id'] ?>" class="more">Update</a></span>
                            <?php endif; ?>
                           </div>
                        </p>
                    </li>

				<?php endforeach; ?>
			</ul>
		</div>


</div>
<?php include 'footer.php' ?>
