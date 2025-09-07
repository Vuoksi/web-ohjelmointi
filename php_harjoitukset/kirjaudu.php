<?php
//Tarkistetaan onko lomake lähetetty
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Lisää tähän koodi joka ottaa vastaan lomakkeen tiedot
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    //Lisää tähän koodi joka tarkistaa käyttäjätunnuksen ja salasanan
    if ($username === "admin" && $password === "salasana") {
        //Kirjautuminen onnistui
        //Alla oleva koodi ohjaa käyttäjän palkkalaskuriin
        echo "<h2>Tervetuloa admin!</h2>";
        echo "<p>Sinut ohjataan palkkalaskuriin muutaman sekunnin kuluttua...</p>";
        echo '<meta http-equiv="refresh" content="2;url=palkkalaskuri.php">';
        exit();
    } else {
        //Kirjautuminen epäonnistui
        echo "Virheellinen käyttäjätunnus tai salasana.";
    }
}
?><!-- IGNORE -->