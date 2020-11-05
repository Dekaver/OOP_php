

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">    
</head>

<body>
    <form class="container"  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <img src="img/Logo-Web-ITK.png" alt="itk" id="itk">
    <img src="img/if-nav.png" alt="Informatika" id="informatika">
          <fieldset>
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input placeholder="Username" type="text" name="username"></td>
                </tr>
                <tr>
                    <td>New Password</td>
                    <td>:</td>
                    <td><input placeholder="Password" type="password" name="password"></td>
                </tr>
                <tr>
                    <td>Confirm Password</td>
                    <td>:</td>
                    <td><input placeholder="Password" type="password" name="password"></td>
                </tr>
                <tr>
                    <input class="login" type="submit" value="Registrasi">
                    <input class="reset" id='Rregistrasi' type="reset" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
<?php
include 'includes\class-autoload.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userObj = new user();
    $dosenObj = new dosen();
    $mahasiswaObj = new mahasiswa();

    $username = $_POST['username'];
    $password = $_POST['password'];

    $allNim = $mahasiswaObj->getNim();
    $allNip = $dosenObj->getNip();
    $hakAkses = '';

    foreach ($allNim as $value){
        if (in_array($_POST['username'], $value)){
            $hakAkses = 'mahasiswa';
        }
    }

    foreach ($allNip as $value){
        if (in_array($_POST['username'], $value)){
            $hakAkses = 'dosen';
        }
    }
    if ($hakAkses == ''){
      echo "<h4 id='red'>Username tidak Di Izinkan</h4><style>#red{color:red;}fieldset{border:3px solid red;}</style>";
    }else{
      $result = $userObj->addUser($username, $password, $hakAkses);
      header('Location: login.php');
    }
}

?>
    </form>
</body>
</html>