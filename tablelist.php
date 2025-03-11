<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulu saraksts</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="datorkursi.html">Atpakaļ</a>
    <h1>Tabulu saraksts</h1>

    <ol class="tablelist">
        <?php
            require_once("config.php");
            $sql = "show full tables from datorkursi2 where Table_type = 'BASE TABLE'";
            $result = $conn->query($sql);

            
            while ($string = $result->fetch_assoc()) {
                echo "<li>".$string["Tables_in_datorkursi2"]."</li>";
                // echo "<br>";
            }
            // $string = $result->fetch_assoc();
            // print_r($string);
        ?>
    </ol>
</body>
</html>