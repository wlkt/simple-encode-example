<?php

$link = mysqli_connect("localhost", "username", "password") or die();
mysqli_select_db($link, "comments") or die();

?>
