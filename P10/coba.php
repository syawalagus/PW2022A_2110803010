<?php
$mahasiswa = ["joni", "2110803010", "pencak silat", "jonjon@gmail.com"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> COBA COBA </title>
</head>
<body>
<h1>Daftar mahasiswa</h1>
<ul>
    <?php foreach ($mahasiswa as $mhs) : ?>
    <li><?php echo $mhs ?></li>
    <?php endforeach; ?>
    <ul>
</body>
</html>