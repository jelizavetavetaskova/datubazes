<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulas dati</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="adddata.php">Atpakaļ</a>

    <?php
        require_once("config.php");
        $table = $_POST['tables'];
        echo '<h1>Tabulas '.$table.' dati</h1>';
        $sql="select * from ".$table.";";
        $res = $conn->query($sql);
        $fieldnames = $res->fetch_fields();
        // print_r($res);
        $column_count = $res->field_count;
        $sql="select max(id$table) from ".$table;
        $resmax = $conn->query($sql);
        
        $rowmax = $resmax->fetch_assoc();    
        $idmax = $rowmax["max(id$table)"];
        $idmax++;
        
        echo "<table>";
        echo "<tr>";
        foreach($fieldnames as $fieldname) {
            echo "<th>";
            echo $fieldname->name." ";
            echo "</th>";
        }
        echo "<th></th>";
        
        echo "</tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            foreach($row as $data) {
                echo "<td>";
                echo $data;
                echo "</td>";
            }
            echo "<td></td>";
            echo "</tr>";
        }

        echo '<form action="" method="post">';
        echo "<tr>";
        echo "<td>$idmax</td>";
        for ($i = 2; $i<=$column_count; $i++) {
            echo "<td>";
            echo '<input type="text" name="field'.$i.'" value="John">';
            echo "</td>";
        }
        echo '<td><input type="submit" name="add" value="Pievienot"></td>';
        echo "</tr>";
        echo '</form>';
        echo "</table>";

        ?> 
</body>
</html>