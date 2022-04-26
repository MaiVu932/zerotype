<?php include 'header.php' ?>

<?php
    include '../PostRepo.php';
    $post = new PostRepo();
    $categories = $post->categoris();

    if(isset($_POST['sub-create-post'])) {
        $post->create($_POST, $_SESSION['user'][0]['id']);
    }
?>

<link rel="stylesheet" href="../css/style1.css" />
<div id="contents">
		<div id="about">
<form method="POST">
    <h1>CREATE POST</h1>

    <label>Category</label>
    <br>
    <select name="sl-category" style="width: 765px; height: 40px; border-color: #ddd; border-radius: 2px;">
        <!-- <option value="1">PHP</option> -->
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label>Title</label> 
    <input type="text" class="form-control"  name="txt-title" required />

    <label>Content</label>
    <textarea name="txt-content" class="form-control" cols="30" rows="6" required></textarea>

    
    <input type="submit" name="sub-create-post" value="Create post" style="margin-top: 10px;" required />

    
</form>
        </div>
</div>

<?php include 'footer.php' ?>
