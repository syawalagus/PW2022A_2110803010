<?php

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  //cek username & password 
  if ($_POST["Username"] == "admin" && $_POST["Password"] == "123") {

    //jika benar, redirect ke halaman admin
    header("Location: admin.php");
    exit;
  } else {

    //jika salah, tampilkan pesan kesalahan
    $error = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login</title>

  <style>
    body {
      background-color: whitesmoke;
    }

    .header {
      color: darkgreen;
      font-weight: bold;
      font-size: 20px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      text-align: center;
    }

    .isi {
      width: 400px;
      height: 250px;
      margin: auto;
      background-color: white;
      padding: 10px;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .bag1 {
      margin-top: 20px;
      margin-left: 55px;
    }

    td {
      padding: 10px 5px;
    }

    .but button {
      background-color: blue;
      color: white;
      font-weight: bold;
      border: 1px solid black;
      border-radius: 5px;
      font-size: 14px;
      width: 70px;
      height: 30px;
      margin-left: 165px;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <div class="header">
    <h1>Login</h1>
  </div>

  <div class="isi">
    <form action="" method="post">
      <table class="bag1">
        <tr>
          <td width: 120px><label for="Username">Username </label></td>
          <td><input type="text" name="Username" id="Username"></td>
        </tr>
        <tr>
          <td><label for="Password">Password </label></td>
          <td><input type="password" name="Password" id="Password"></td>
        </tr>
        </tabel>

        <table>
          <tr>
            <td class="er">
              <?php if (isset($error)) : ?>
                <p style="color: red; font-style: italic; font-weight: lighter; ">Username atau Password salah!</p>
              <?php endif ?>
            </td>
          </tr>

          <tr>
            <td class="but">
              <button type="submit" name="submit">Log In</button>
            </td>
          </tr>
        </table>

    </form>

  </div>

</body>

</html>