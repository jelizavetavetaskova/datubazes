<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulas dati</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="tabledata.php">Atpakaļ</a>

    <?php
        require_once("config.php");
        $table = $_POST['tables'];
        echo '<h1>Tabulas '.$table.' dati</h1>';
        $sql="select * from ".$table.";";
        $res = $conn->query($sql);

        // echo "<br>Tabula: ".$table;
            /* $sql = "show full tabl
            es from datorkursi2 where Table_type = 'BASE TABLE'";
            $result = $conn->query($sql);

            
            while ($string = $result->fetch_assoc()) {
                echo "<li>".$string["Tables_in_datorkursi2"]."</li>";
                // echo "<br>";
            }
            // $string = $result->fetch_assoc();
            // print_r($string);*/
        ?> 
</body>
</html>