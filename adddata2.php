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

        // if "Pievienot" was clicked
        if (isset($_POST["add"])) {
            $table = $_POST['table'];
            $num_of_columns = $_POST["num_of_col"];
            $sql = "insert into $table values(null, ";
            for ($i = 2; $i < $num_of_columns; $i++) {
                $sql=$sql.'"'.$_POST["field$i"].'", ';
            } // for
            $sql=$sql.'"'.$_POST["field$i"].'")';
            $res_add = $conn->query($sql);
            $_POST["add"] = "";
        } // if

        // if "Dzest" was clicked
        if (isset($_POST["delete"])) {
            $id = $_POST["id"];
            $table = $_POST["table"];
            $sql = "delete from $table where id$table = $id";
            $res_delete = $conn->query($sql); // deletes a row from database
            $_POST["delete"] = "";
        } // if

        
        // select data from table
        $sql="select * from ".$table.";";
        $res = $conn->query($sql);
        $fieldnames = $res->fetch_fields();

        // find max id
        $column_count = $res->field_count;
        $sql="select max(id$table) from ".$table;
        $resmax = $conn->query($sql);
        
        // set id to max+1
        $rowmax = $resmax->fetch_assoc();    
        $idmax = $rowmax["max(id$table)"];
        $idmax++;
        
        // row with field names
        echo "<table>";
        echo "<tr>";
        foreach($fieldnames as $fieldname) {
            echo "<th>";
            echo $fieldname->name." ";
            echo "</th>";
        } // foreach
        echo "<th></th>";
        
        echo "</tr>";

        // rows with data
        while ($row = $res->fetch_assoc()) {
            echo '<form method="post">';
            echo "<tr>";
            $id = $row["id$table"];
            foreach($row as $data) {
                echo "<td>";
                echo $data;
                echo "</td>";
            } // foreach
            echo '<input type="hidden" name="id" value="'.$id.'">';
            echo '<input type="hidden" name="table" value="'.$table.'">';
            echo '<td><input type="submit" name="delete" value="Dzest" class="width" onclick="showMessageDeleted()"></td>';
            echo "</tr>";
            echo "</form>";
        } // while

        // row for data adding
        echo '<form action="" method="post">';
        echo "<tr>";
        echo "<td>$idmax</td>";
        for ($i = 2; $i<=$column_count; $i++) {
            echo "<td>";
            echo '<input type="text" name="field'.$i.'" value="">';
            echo "</td>";
        } // for
        // create hidden data, table name, number of columns
        echo '<input type="hidden" name="table" value="'.$table.'">';
        echo '<input type="hidden" name="num_of_col" value="'.$column_count.'">';
        echo '<td><input type="submit" name="add" value="Pievienot" class="width" onclick="showMessageAdded()"></td>';
        echo "</tr>";
        echo '</form>';
        echo "</table>";
    
        ?> 

        <script>
            function showMessageDeleted() {
                alert("Ieraksts tika dzēsts");
            }
            function showMessageAdded() {
                alert("Ieraksts tika pievienots");
            }
        </script>
</body>
</html>