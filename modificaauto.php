<?php
require_once "connection.php";

$targa = $_POST["targa"];


$modifiche = [];

if ($_POST["cavalli"] > 0) {
    $cavalli = $_POST["cavalli"];
    $modifiche[] = "cavalli = '$cavalli'";
}

if ($_POST["marca"] != '') {
    $marca = $_POST["marca"];
    $modifiche[] = "marca = '$marca'";
}

$error;
if (count($modifiche) > 0) {

    $set = implode(", ", $modifiche);

    $sql = "UPDATE auto SET $set WHERE targa = '$targa'";

    if (!mysqli_query($conn, $sql))
        $error=mysqli_error($conn);

    mysqli_close($conn);
}
?>

<html>
<head>
    <title>Risultati ricerca</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>🚗 Risultato</h1>
    <a class="counter" href="./cercaauto.html"> Torna alla ricerca </a>
<?php
if (!$error)
    echo "<h1>Modifica avvenuta con successo!</h1>";
else
    echo "<h1>Errore durante l'aggiornamento: " . $error." </h1>";
?>
</body>
</html>