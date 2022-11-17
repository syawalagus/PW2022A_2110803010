<?php
$mahasiswa = [["joni", "2110803010", "pencak silat", "jonjon@gmail.com"], 
                ["mangden", "123243241", "sesat", "mangkusut@gmail.com"],
                ["mang somat", "1354124", "sport and convention", "djasnsjd@gmail.com"]       
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title> COBA COBA </title>
</head>
<body>
    <h1>Daftar mahasiswa</h1>
    <?php foreach ($mahasiswa as $mhs) { ?>
    <ul>
    <li><?= $mhs [0];  ?></li>
    <li><?= $mhs [1] ;?></li>
    <li><?= $mhs [2] ;?></li>
    <li><?= $mhs [3] ;?></li>
    <ul>
    <?php }?>
</body>
</html>