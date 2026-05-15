<?php
require_once "connection.php";

$cf = $_POST["codicefiscale"];

$modifiche = [];

// Controllo quali campi sono stati compilati per creare una query dinamica
if ($_POST["numero"] != "") {
    $numero = $_POST["numero"];
    $modifiche[] = "numero = '$numero'";
}

if ($_POST["scadenza"] != "") {
    $scadenza = $_POST["scadenza"];
    $modifiche[] = "scadenza = '$scadenza'";
}

if ($_POST["cvc"] != "") {
    $cvc = $_POST["cvc"];
    $modifiche[] = "cvc = '$cvc'";
}

$result = false;
$error = "";

if (count($modifiche) > 0) {
    $set = implode(", ", $modifiche);
    $sql = "UPDATE utenti SET $set WHERE codicefiscale = '$cf'";
    
    $result = mysqli_query($conn, $sql);
    
    if (!$result) {
        $error = mysqli_error($conn);
    }
    
    mysqli_close($conn);
} else {
    $error = "Nessun dato inserito per la modifica.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Risultati ricerca</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>🚗 Risultato</h1>
    <a class="counter" href="./cercaauto.html">Torna alla ricerca</a>

    <?php
    // Logica di visualizzazione basata sul successo della query
    if ($result) {
        echo "<h1>Modifica avvenuta con successo!</h1>";
    } else {
        echo "<h1>Errore durante l'aggiornamento: " . $error . "</h1>";
    }
    ?>
</body>
</html>