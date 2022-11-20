<?php

echo "Looping menggunakan for : </br>";
for($i = 1; $i <= 10; $i++) {
    echo "<li> Urutan ke-$i</li>";
}

echo "</br>";
echo "Looping menggunakan while : /br>";
$i = 1;
while($i <= 10) {
    echo "<li> Urutan ke-$i</li>";
    $i++;
}

?>
