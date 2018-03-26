<?php

include 'database.php';

if ($_POST['author'] && $_POST['body']) {

    $author = mysqli_real_escape_string($link, $_POST['author']);
    $body = mysqli_real_escape_string($link, $_POST['body']);

    mysqli_query($link, "INSERT INTO comments (`author`, `body`) VALUES ('$author', '$body')");
    
    header("Location: /post.php");
}

else {
    header("Location: /post.php");
}

?>
