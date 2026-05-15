<?php
// --- Parte 1: Logica di eliminazione ---
require_once "connection.php";

$targa = $_GET['targa'];

$sql = "DELETE from auto where targa = '$targa'";

$ok = mysqli_query($conn, $sql);

$righe = mysqli_affected_rows($conn);
?>

<html>
<head>
    <title>Risultati</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>🚗 Risultato</h1>
    <a class="counter" href="./home.html">Home</a>

    <?php
    if ($ok) {
        if ($righe > 0) {
            echo "<h1>Eliminazione avvenuta con successo!</h1>";
        } else {
            echo "<h1>Targa auto non trovata...</h1>";
        }
    } else {
        echo "<h1>Errore durante l'eliminazione: " . mysqli_error($conn) . "</h1>";
    }
    ?>
</body>
</html>