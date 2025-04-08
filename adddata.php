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
    <h1>Tabulu dati</h1>

    <ol class="tablelist">
        <?php
            require_once("config.php");
            $sql = "show full tables from datorkursi3 where Table_type = 'BASE TABLE'";
            $result = $conn->query($sql);

            echo '<form action="adddata2.php" method="post">
                 <label for="table">Izvēlieties tabulu:</label>
                 <select name="table">';

            while ($string = $result->fetch_assoc()) {
                echo '<option value="'.$string["Tables_in_datorkursi3"].'">'.$string["Tables_in_datorkursi3"].'</option>';
            };

echo '</select>
  <br><br>
  <input type="submit" value="Pievienot/dzēst datus">
</form>';
        ?>
    </ol>
</body>
</html>