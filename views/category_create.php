<?php include 'header.php' ?>

<?php
    if(isset($_POST['sub-create-category'])) {
        include '../CategoryRepo.php';
        $category = new CategoryRepo();
        $category->add($_POST);
    }
?>

<link rel="stylesheet" href="../css/style1.css" />
<div id="contents">
		<div id="about">
<form method="POST">
    <h1>CREATE CATEGORY</h1>
    <label>Name</label> 
    <input type="text" class="form-control"  name="txt-name" />

    <label>Description</label>
    <input type="text" class="form-control"  name="txt-description" required />

    
    <input type="submit" name="sub-create-category" value="Create category" style="margin-top: 10px;" required />

    
</form>
        </div>
</div>

<?php include 'footer.php' ?>
