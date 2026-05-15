<?php
require_once "connection.php";

$targa=$_POST["targa"];
$cavalli=$_POST["cavalli"];
$cilindrata=$_POST["cilindrata"];
$anno=$_POST["anno"];
$prezzo=$_POST["prezzo"];
$marca=$_POST["marca"];
$modello=$_POST["modello"];

$query = "INSERT INTO auto 
(targa, cavalli, cilindrata, anno, prezzo, marca, modello)
VALUES ('$targa','$cavalli','$cilindrata','$anno',
'$prezzo','$marca', '$modello')";

$risultato=mysqli_query($conn,$query);
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
if ($risultato)
{
    echo "<h1>Inserimento avvenuto con successo!</h1>";
}
else
{
    echo "<h1>Errore durante l'inserimento: " . mysqli_error($conn)." </h1>";
}
?>

</body>
</html>