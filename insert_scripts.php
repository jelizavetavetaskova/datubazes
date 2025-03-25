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

    <ol class="tablelist" id="tablelist">
        <?php
            require_once("config.php");
            $sql = "show full tables from datorkursi3 where Table_type = 'BASE TABLE'";
            $result = $conn->query($sql);

            while ($string = $result->fetch_assoc()) {
                $table = $string["Tables_in_datorkursi3"];
                echo '<li><a href="#'.$table.'">'.$table.'</a></li>';
                // echo "<br>";
            }
        ?>
    </ol>

    <h3 id="kursi">Kursi</h3>
    <pre>
        INSERT INTO `kursi` (`idkursi`, `nosaukums`, `cena`, `ilgums`, `anotacija`) VALUES
        (1, 'Excel 7.0', 30, 64, 'Programma'),
        (2, 'Word 97', 25, 32, 'Programma'),
        (3, 'Grāmatvedība', 36, 120, 'Programma'),
        (4, 'Datu bāzes I', 50, 32, 'Programma'),
        (5, 'Programmēšana', 100, 32, 'Programma'),
        (6, 'Datu bazes II', 100, 32, 'Programma');
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="grupas">Grupas</h3>
    <pre>
        INSERT INTO `grupas` (`idgrupas`, `idkursi`, `sakums`, `beigas`, `valoda`, `idtelpa`, `idpasniedzeji`) VALUES
        (1, 1, '1998-01-15', '1998-01-29', 'RU', 1, 3),
        (2, 1, '1998-03-12', '1998-03-26', 'LV', 1, 1),
        (3, 2, '1998-04-04', '1998-04-18', 'LV', 2, 2),
        (4, 3, '1999-01-02', '1998-01-30', 'LV', 1, 1),
        (5, 3, '1999-04-26', '1999-05-30', 'RU', 1, 2),
        (6, 4, '2024-10-24', '2024-12-24', 'LV', 1, 1),
        (7, 4, '2024-10-24', '2025-01-24', 'LV', 2, 1),
        (8, 5, '2024-10-24', '2024-12-20', 'LV', 3, 1),
        (9, 5, '2024-10-24', '2025-03-05', 'LV', 1, 1);
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="pasniedzeji">Pasniedzēji</h3>
    <pre>
        INSERT INTO `pasniedzeji` (`idpasniedzeji`, `uzvards`, `vards`, `telefons`) VALUES
        (1, 'Vagale', 'Vija', '12345678'),
        (2, 'Šķirmante', 'Karīna', '23456789'),
        (3, 'Rudens', 'Jānis', '34567890');
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="reklama">Reklāma</h3>
    <pre>
        INSERT INTO `reklama` (`idreklama`, `veids`, `nosaukums`) VALUES
        (1, 'internet', 'delfi.lv'),
        (2, 'radio', 'Radio Tev'),
        (3, 'TV', 'TV6');
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="saraksts">Saraksts</h3>
    <pre>
        INSERT INTO `saraksts` (`idsaraksks`, `idgrupas`, `idstudenti`, `darbs`, `faktiskais_ilgums`, `atlaide_procenti`, `summa`, `maksajuma_veids`, `samaksats`, `idreklama`, `vertejums`, `apliecibas_numurs`) VALUES
        (1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (2, 1, 2, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (3, 1, 3, 0, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
        (4, 2, 4, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (5, 2, 5, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (6, 3, 6, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (7, 3, 1, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (8, 4, 4, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (9, 4, 7, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (10, 4, 8, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (11, 4, 1, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (12, 5, 9, 1, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (13, 5, 10, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (14, 6, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (15, 6, 2, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (16, 6, 3, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (17, 7, 4, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (18, 7, 5, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (19, 7, 6, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (20, 8, 7, 0, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL),
        (21, 8, 8, 0, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
        (22, 8, 9, 0, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
        (23, 9, 10, 1, NULL, NULL, NULL, NULL, NULL, 3, NULL, NULL),
        (24, 9, 1, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
        (25, 9, 2, 0, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL);
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="studenti">Studenti</h3>
    <pre>
        INSERT INTO `studenti` (`idstudenti`, `uzvards`, `vards`, `personas_kods`, `adrese`, `telefons`) VALUES
        (1, 'Toba', 'Daina', '123456-12345', 'Ventspils', '12345678'),
        (2, 'Ziemelis', 'Ralfs', '123456-12345', 'Saldus', '12345678'),
        (3, 'Tobans', 'Juris', '123456-12345', 'Talsi', '12345678'),
        (4, 'Liepiņa', 'Inga', '123456-12345', 'Rīga', '12345678'),
        (5, 'Ozola', 'Zita', '123456-12345', 'Daugavpils', '12345678'),
        (6, 'Goba', 'Regīna', '123456-12345', 'Kuldīga', '12345678'),
        (7, 'Zemītis', 'Ingus', '123456-12345', 'Tukums', '12345678'),
        (8, 'Ciba', 'Aina', '123456-12345', 'Jelgava', '12345678'),
        (9, 'Tobans', 'Jānis', '123456-12345', 'Liepāja', '12345678'),
        (10, 'Alba', 'Anna', '123456-12345', 'Brocēni', '12345678');
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>

    <h3 id="telpas">Telpas</h3>
    <pre>
        INSERT INTO `telpas` (`idtelpa`, `numurs`, `vietu_skaits`) VALUES
        (1, 'C406', 24),
        (2, 'A307', 30),
        (3, 'A205', 16);
    </pre>
    <a href="#tablelist">Uz tabulu sarakstu</a>
</body>
</html>