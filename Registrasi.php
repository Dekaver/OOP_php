<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  // define variables and set to empty values
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
  }

  function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>

  <h2>Input Data Dosen</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
      <tr>
        <td>Nama</td>
        <td>:</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>No Kontak</td>
        <td>:</td>
        <td><input type="text" name="no_kontak"></td>
      </tr>
      <tr>
        <td>Pendidikan Terakhir</td>
        <td>:</td>
        <td>
          <input type="radio" name="s1" value="S1">S1
          <input type="radio" name="s2" value="S2">S2</td>
      </tr>
      <tr>
        <td>Tahun Lulus</td>
        <td>:</td>
        <td>
          <select>
            <?php
            for ($i = 2015; $i <= 2018; $i++) {
              echo "<option value=$i>$i</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td></td>
        <td></td>
        <td><input type="submit" name="submit" value="Submit"></td>
      </tr>
    </table>

</html>