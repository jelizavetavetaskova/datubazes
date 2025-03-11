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
        $fieldnames = $res->fetch_fields();

        echo "<table>";
        echo "<tr>";
        foreach($fieldnames as $fieldname) {
            echo "<th>";
            echo $fieldname->name." ";
            echo "</th>";
        }
        echo "</tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $data) {
                echo "<td>";
                echo $data;
                echo "</td>";
            }
            echo "</tr>";
        }
        echo "</table>"

        ?> 
</body>
</html>