<?php

include './database.php';

function xssafe($data,$encoding='UTF-8') {
   
   return htmlspecialchars($data,ENT_QUOTES | ENT_HTML401,$encoding);
}

function xecho($data) {
   
   echo xssafe($data);
}

?>

<body style="background-color: #EEF; color: #000;">

    <h1 style="color: #900; margin: auto; width: 25%">Post</h1>
    <div style="margin: auto; width: 25%;">
            form
            <form action="insertcomment.php" method="post">
                <span style="background-color: #98E; margin:2px;"> Name: </span> <input type="text" name="author"><br>
                <span style="background-color: #98E; margin:2px;">  Post: </span> <input type="text" name="body">
                <input type="submit" value="Submit" />
            </form>
    </div>

    <div style="margin: auto; width: 50%;">
        <?php 
            $result = mysqli_query($link, "SELECT * FROM comments") or die ("Query failed : " . mysqli_error());
            while($row = mysqli_fetch_object($result)) { 
                echo '<div style="background-color: #DDF; margin: 10px; padding: 10px;">';
                echo '<p>';
                xecho($row->author);
                echo '<br><br>';
                xecho($row->body);
                echo '</p>'; 
                echo '</div>';
            }
        ?>
    </div>

</body>

<?php 

    mysqli_free_result($result);
    mysqli_close($link);
?>
