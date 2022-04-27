<?php 
    session_start();
    include 'header.php';
    include '../PostRepo.php';
    $post = new PostRepo();
    $info = $post->postByIdPost($_GET['id']);
    $comments = $post->commentsByIdPost($_GET['id']);
    if(isset($_POST['sub-comment'])) {
        $post->createCommentToPost($_POST['txt-comment']);
    }
    $post->validate();
?>
<link rel="stylesheet" href="../css/post.css" />

	
	<div id="contents">
		<div class="post">
			<div class="date">
				<p>
					<span><?php echo $info['month'] ?></span>
					<?php echo $info['year'] ?>
				</p>
			</div>
			<h1><?php echo $info['title'] ?><br><label style="color: #d0d0d0; font-size: 14px" >Viewer: <?php echo $info['count_view'] ?> </label><span class="author"><?php echo $info['username'] ?></span></h1>
			<p>
                <?php echo $info['content'] ?>
			</p>
			<span><a href="news.php" class="more">Back to News</a></span>
		</div>

        <div id="about">
            <h1>Comments</h1>
            <?php foreach($comments as $comment): ?>
                <div class="comment">
                <div class="avata">
                    <img src="../images/avata/<?php echo $comment['image']; ?>" style="width: 80px; height: 80px; border-radius: 40px;" />
                </div>
                <div class="cmt-content">
                    <h2><?php echo $comment['username'] ?></h2>
                    <span><?php echo $comment['create_at'] ?></span>
                    <br>
                    <p>
                        <?php echo strlen($comment['content']) <= 150 ? $comment['content'] : (substr($comment['content'], 0, 150) . '...'); ?> 
                </p>
                </div>
            </div>
            <?php endforeach; ?>
           

                <?php if(isset($_SESSION['user'])): ?>
                    <form  method="POST" enctype="multipart/form-data" id="HDpro">

                        <textarea name="txt-comment" id="" style="width: 100%;" rows="6"></textarea>

                        <input type="submit" name="sub-comment" value="Send" />

                    </form>

               <?php endif; ?>
        </div>

	</div>