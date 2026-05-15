<?php
require_once 'connection.php';
$marca=$_GET['marca'];
$modello=$_GET['modello'];
$cmin=(int)$_GET['cmin'];
$cmax=(int)$_GET['cmax'];

$query = 'Select * from auto where 1=1';

if($marca!=='')
$query = $query." and marca ='".$marca."'";

if($modello!=='')
$query = $query." and modello ='".$modello."'";

if($cmin!=='')
$query = $query." and cavalli >='".$cmin."'";

if($cmax!=='')
$query = $query." and cavalli <='".$cmax."'";

$autoTrovate = mysqli_query($conn, $query);

$numAutoTrovate= mysqli_num_rows($autoTrovate);
?>

<html>
    <head>
        <title>Risultati Ricerca</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>Risultati Ricerca</h1>
        <div class = "card-container">
            <h1> N. Auto: <?php echo $numAutoTrovate ?> </h1>
            <ul>
                <?php
                    for($i=0; $i<$numAutoTrovate; $i++){
                        $auto= mysqli_fetch_assoc($autoTrovate);
                        $infoAuto=$auto['marca']."-".$auto['modello'];
                        echo "<li>".$infoAuto."</li>";
                        echo "<li> <img height='255' src=".$auto["img"]."> </li>";
                    }
                ?>
            </ul>
        </div>
    </body>
</html>
