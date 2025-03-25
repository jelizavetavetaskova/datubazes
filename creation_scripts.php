<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulu dati</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <a href="datorkursi.html">Atpakaļ</a>
    <h1>Tabulu izveides skripti</h1>

        <?php
            require_once("config.php");
            $script = 1;

            if (isset($_POST["submit"])) {
                // ja bija nospiesta submit poga
                $table = $_POST["tables"];
                echo "<h3>Tabulas '".$table."' izveides skripts</h3>";
                $sql = "show create table ".$table;
                // echo "<br>".$sql;
                $result = $conn->query($sql);
                $string = $result->fetch_assoc();
                // print_r($string);
                echo "<pre>";
                echo $string["Create Table"];
                echo "</pre>";
            }

            echo "<br><hr><br>";
            $sql = "show full tables from datorkursi3 where Table_type = 'BASE TABLE'";
            $result = $conn->query($sql);

            echo '<form action="" method="post">
            <label for="tables">Izvēlieties tabulu:</label>
            <select name="tables" required>';


            echo '<option value="" disabled selected value> </option>';
            while ($string = $result->fetch_assoc()) {
                echo '<option value="'.$string["Tables_in_datorkursi3"].'">'.$string["Tables_in_datorkursi3"].'</option>';
            };
                
            echo '</select>
            <br><br>
            <input type="submit" value="Apskatīt datus" name="submit">
            </form>';
        ?>

</body>
</html>