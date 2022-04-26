<?php include 'header.php' ?>
<link rel="stylesheet" href="../css/categories.css" />

<?php
    include '../CategoryRepo.php';
    $category = new CategoryRepo();
    $categories = $category->categoris();
?>

<div class="content">
<div class="title">
    <h1>Categories</h1>
    <a href="category_create.php">Add category</a>
</div>
<ul>
    <?php foreach($categories as $category): ?>
        <li>
            <h2><a href="./category_update.php?id=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a></h2>
            <p><?php echo $category['description'] ?></p>
        </li>
        
    <?php endforeach; ?>
    
</ul>

</div>
<?php include 'footer.php' ?>
