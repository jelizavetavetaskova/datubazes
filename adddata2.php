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
        // if (session_id() === '') {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
            require_once("config.php");
            $table = $_POST['table'];
            $_SESSION['table'] = $table;
            $_SESSION['times'] = 0;
        }
        else {
            $_SESSION['times'] = 1;
        }
        {
            $table = $_SESSION['table'];
        
        echo '<h1>Tabulas '.$table.' dati</h1>';

        
        /* if (isset($_SERVER['HTTP_CACHE_CONTROL'])) {
            echo "Refresh";
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // $_SESSION['times'] = $_SESSION['times']++;
                echo $_SESSION['times'];
                unset($_POST);
                // echo "POST:".$_POST['add'];
                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            }
        } */

        // if "Pievienot" was clicked
        if (isset($_POST["add"]) and $_SESSION['times'] == 0) {
            session_start();

            $table = $_POST['table'];
            $num_of_columns = $_POST["num_of_col"];
            $sql = "insert into $table values(null, ";
            for ($i = 2; $i < $num_of_columns; $i++) {
                $sql=$sql.'"'.$_POST["field$i"].'", ';
            } // for
            $sql=$sql.'"'.$_POST["field$i"].'")';
            $res_add = $conn->query($sql);
            $_POST["add"] = "";

            //header("Location: ".$_SERVER['PHP_SELF']);
            //exit;
            
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
            echo '<form method="post" onsubmit="alert('."'Ieraksts dzēsts!'".');">';
            echo "<tr>";
            $id = $row["id$table"];
            foreach($row as $data) {
                echo "<td>";
                echo $data;
                echo "</td>";
            } // foreach
            echo '<input type="hidden" name="id" value="'.$id.'">';
            echo '<input type="hidden" name="table" value="'.$table.'">';
            echo '<td><input type="submit" name="delete" value="Dzest" class="width" ></td>';
            echo "</tr>";
            echo "</form>";
        } // while

        // row for data adding
    ?>

        <form action="" method="post" onsubmit="alert('Ieraksts pievienots!');">;
            <?php
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
                echo '<td><input type="submit" name="add" value="Pievienot" class="width"></td>';
                $_SESSION['times'] = 1;
                echo "</tr>";
                echo '</form>';
                echo "</table>";}
                // $_SESSION['table'] = null;
                // session_destroy();
            ?>
</body>
</html>