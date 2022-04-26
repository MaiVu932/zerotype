<?php
include '../PostRepo.php';
$post = new PostRepo();
$post->approveDeny($_GET['id']);