<!DOCTYPE html>
<html lang="en">
<head>
    <title>POST</title>
</head>
<body>
    <form action="" method="post">
        <label for="angka">Masukkan Angka : </label>
        <input type="text" name="angka" id="angka">
        <button type="submit" name="submit">Tampilkan</button>
    </form>   

    <?php if (isset($_POST["submit"]) ) : ?>
    <?php 
    $_POST["angka"];
    
    echo "<br>";
    for ($i = $_POST["angka"]; $i >= 1; $i--){
        for ($j = 1; $j <= $i; $j++){
            echo $j." ";
        }
            echo "<br>";
    }    
    ?>
    <?php endif; ?>
</body>
</html>