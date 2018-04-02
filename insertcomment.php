<?php

include './database.php';

if ($_POST['author'] && $_POST['body']) {

    $stmt = $link->prepare("INSERT INTO comments (`author`, `body`) VALUES (?, ?)");
    $stmt->bind_param("ss", $author, $body);

    $author = $_POST['author'];
    $body = $_POST['body'];

    $stmt->execute();

    header("Location: ./post.php");
}

else {
    header("Location: ./post.php");
}

?>
