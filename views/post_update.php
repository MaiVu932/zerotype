<?php include 'header.php' ?>

<?php
    include '../PostRepo.php';
    $post = new PostRepo();
    $categories = $post->categoris();
    $infoPost = $post->postByIdPost($_GET['id']);
    $post->validate();

    if(isset($_POST['sub-update-post'])) {
        $post->updateByIdPost($_POST, $_GET['id']);
    }
?>

<link rel="stylesheet" href="../css/style1.css" />
<div id="contents">
		<div id="about">
<form method="POST">
    <h1>UPDATE POST</h1>

    <label>Category</label>
    <br>
    <select name="sl-category" style="width: 765px; height: 40px; border-color: #ddd; border-radius: 2px;">
        <?php foreach($categories as $category): ?>
            <?php if($category['id'] == $infoPost['c_id']):  ?>
                <option selected value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
            <?php endif; ?>
                <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label>Title</label> 
    <input type="text" class="form-control"  name="txt-title" value="<?php echo $infoPost['title'] ?>" required />

    <label>Content</label>
    <textarea name="txt-content" class="form-control" cols="30" rows="6" required><?php echo $infoPost['content'] ?></textarea>

    
    <input type="submit" name="sub-update-post" value="Update post" style="margin-top: 10px;" required />

    
</form>
        </div>
</div>

<?php include 'footer.php' ?>
