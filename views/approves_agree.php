<?php
include '../PostRepo.php';
$post = new PostRepo();
$post->approveAgree($_GET['id']);