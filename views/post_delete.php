<?php

include '../PostRepo.php';
$post = new PostRepo();
$post->deleteByIdPost($_GET['id']);