<?php

include_once '../../db.php';
include_once './classes/LoadBlog.php';

if (isset($_POST['remove'])) {
    $id = $_POST['id'];
    $blogList = new BlogListResult($conn);
    $blogInstances = $blogList->getBlogList();

    foreach ($blogInstances as $blog) {
        if ($blog->getId() == $id) {
            echo 'Blog found';
            $blog->remove();
        }
    }
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $remove = $_POST['remove'];
    $blogList = new BlogListResult($conn);
    $blogInstances = $blogList->getBlogList();

    foreach ($blogInstances as $blog) {
        if ($blog->getId() == $id) {
            echo 'Blog found';
            $blog->updateData($title, $content, $author, $date);
            $blog->updateDataSQL();
        }
    }
}
