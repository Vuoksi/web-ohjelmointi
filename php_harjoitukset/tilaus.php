<?php
// PHP-tehtävä 7: Tilauslomakkeen prototyyppi

// Kopioidaan funktio tehtävästä 6
function laskeToimituskulut($toimitustapa) {
    switch ($toimitustapa) {
        case "Nouto":
            return 0.00;
        case "Postipaketti":
            return 6.90;
        case "Kotiinkuljetus":
            return 12.50;
        default:
            return 0.00; // Oletusarvo, jos jotain menee pieleen
    }
}

// Alustetaan muuttujat, jotta ne ovat olemassa, vaikka lomaketta ei olisi lähetetty
$yhteenveto = null;

// Tarkistetaan, onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Haetaan tiedot lomakkeelta
    $maara = (int)$_POST["maara"]; // Muunnetaan kokonaisluvuksi turvallisuussyistä
    $toimitustapa = $_POST["toimitustapa"];
    
    // Tuotetiedot
    $hinta_kpl = 349.90;
    
    // Laskutoimitukset
    $valisumma = $maara * $hinta_kpl;
    $toimituskulut = laskeToimituskulut($toimitustapa);
    $kokonaishinta = $valisumma + $toimituskulut;
    
    // Rakennetaan yhteenveto-muuttuja tulostusta varten
    $yhteenveto = "<h2>Tilauksen yhteenveto</h2>"
                . "<p>Määrä: " . $maara . " kpl</p>"
                . "<p>Välisumma: " . number_format($valisumma, 2, ',', '.') . " €</p>"
                . "<p>Toimitustapa: " . $toimitustapa . "</p>"
                . "<p>Toimituskulut: " . number_format($toimituskulut, 2, ',', '.') . " €</p>"
                . "<h3>Yhteensä: " . number_format($kokonaishinta, 2, ',', '.') . " €</h3>";
}
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Tilauslomake</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 2em;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        h1, h2, h3 {
            color: #333;
        }
        .form-group {
            margin-bottom: 1em;
        }
        label {
            display: block;
            margin-bottom: 0.5em;
            color: #555;
        }
        input, select, button {
            width: 100%;
            padding: 0.8em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Varmistaa, että padding ei kasvata leveyttä */
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1em;
        }
        button:hover {
            background-color: #0056b3;
        }
        .yhteenveto {
            margin-top: 2em;
            padding-top: 1em;
            border-top: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tilaa tuote</h1>
        
        <h3>Tuote: Sähköpotkulauta (349,90 €/kpl)</h3>

        <form method="post" action="tilaus.php">
            <div class="form-group">
                <label for="maara">Määrä:</label>
                <input type="number" id="maara" name="maara" min="1" value="1" required>
            </div>
            
            <div class="form-group">
                <label for="toimitustapa">Toimitustapa:</label>
                <select id="toimitustapa" name="toimitustapa">
                    <option value="Nouto">Nouto (0,00 €)</option>
                    <option value="Postipaketti">Postipaketti (6,90 €)</option>
                    <option value="Kotiinkuljetus">Kotiinkuljetus (12,50 €)</option>
                </select>
            </div>
            
            <button type="submit">Laske hinta</button>
        </form>

        <?php
        // Tulostetaan yhteenveto, jos se on laskettu
        if ($yhteenveto) {
            echo '<div class="yhteenveto">' . $yhteenveto . '</div>';
        }
        ?>
    </div>
</body>
</html>