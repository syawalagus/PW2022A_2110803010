<?php 

$_GET["number"];

for ($i = $_GET["number"]; $i >= 1; $i--){
    for ($j = 1; $j <= $i; $j++){
        echo $j." ";
    }
    echo "<br>";

}

?>
