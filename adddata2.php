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
        $table = $_POST['table'];
        echo '<h1>Tabulas '.$table.' dati</h1>';

        if (isset($_POST["add"])) {
            $table = $_POST['table'];
            $num_of_columns = $_POST["num_of_col"];
            $sql = "insert into $table values(null, ";
            for ($i = 2; $i < $num_of_columns; $i++) {
                $sql=$sql.'"'.$_POST["field$i"].'", ';
            }
            $sql=$sql.'"'.$_POST["field$i"].'")';
            echo "<br>Insert= ".$sql;
            $res_add = $conn->query($sql);
        }

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
            echo '<input type="text" name="field'.$i.'" value="">';
            echo "</td>";
        }
        // create hidden data, table name, number of columns
        echo '<input type="hidden" name="table" value="'.$table.'">';
        echo '<input type="hidden" name="num_of_col" value="'.$column_count.'">';
        echo '<td><input type="submit" name="add" value="Pievienot"></td>';
        echo "</tr>";
        echo '</form>';
        echo "</table>";
        ?> 
</body>
</html>