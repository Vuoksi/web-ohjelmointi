<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Toimituskululaskuri</title>
</head>
<body>
    <h1>Laske toimituskulut</h1>
    <?php
    // 1. Funktion määrittely
    function laskeToimituskulut($toimitustapa) {
        switch ($toimitustapa) {
            case "Nouto":
                return 0.00;
            case "Postipaketti":
                return 6.90;
            case "Kotiinkuljetus":
                return 12.50;
            default:
                return -1; // Palautetaan -1, jos toimitustapaa ei löydy
        }
    }

    // 2. Funktion kutsuminen ja tulosten käsittely
    $valittu_tapa = "Postipaketti";
    $hinta = laskeToimituskulut($valittu_tapa);

    echo "<p>Valittu toimitustapa: " . $valittu_tapa . "</p>";

    if ($hinta != -1) {
        echo "<p><b>Toimituskulut: " . number_format($hinta, 2, ',', '') . " €</b></p>";
    } else {
        echo "<p><b>Virheellinen toimitustapa valittu.</b></p>";
    }
    ?>
</body>
</html>