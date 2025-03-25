<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vaicājumi</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="datorkursi.html">Atpakaļ</a>
    <h1>Vaicājumi</h1>

    <div id="querylist" class="tablelist">
        <ul class="without-symbol">
            <form action="" method="post"><input type="submit" value="1. vaicājums" name="query"></form>
            <form action="" method="post"><input type="submit" value="2. vaicājums" name="query"></form>
            <form action="" method="post"><input type="submit" value="3. vaicājums" name="query"></form>
        </ul>
    </div>
    

    <?php
        require_once("config.php");

        if (isset($_POST["query"])) {
            $sql_query = $_POST["query"];

            switch($sql_query) {
                case "1. vaicājums" : echo "1. vaicājums"; 
                                      break;

                default: echo "Pēc nokluējuma";
            }
        }
    ?>

</body>
</html>