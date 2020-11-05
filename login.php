

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
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
                    <td>Password</td>
                    <td>:</td>
                    <td><input placeholder="Password" type="password" name="password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input class="login" type="submit" value="Login">
                        <input class="reset" id="Rlogin" type="reset" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
<?php
include 'includes\class-autoload.inc.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = new user();
    $dosenObj = new dosen();
    $mahasiswaObj = new mahasiswa();

    $allNim = $mahasiswaObj->getNim();
    $allNip = $dosenObj->getNip();
    $result = $user->getUser();

    $pesaneror='';
    $i=0;
    foreach ($result as $row){
        if ($row['username'] === $_POST['username']){
            
            if ($row['password'] === $_POST['password']){
                session_start();
                $_SESSION["username"] = $row['username'];
                $_SESSION["password"] = $row['password'];
                $_SESSION['hakAkses'] = $row['hak_akses'];
                header("Location: index.php");
            }else{
                $pesaneror='Incorrect Password';
                $i++;
                break;
            }
        }
        $pesaneror='Username Not Found';
    }

    if ($i==0){
        foreach ($allNim as $value){
            if (in_array($_POST['username'], $value)){
                $pesaneror = "<p>Click <a href=Registrasi.php>here</a> for Registrasi as ".$_POST['username']."</p>";
                $i++;
            
            }
        }
    }elseif ($i==0){
        foreach ($allNip as $value){
            if (in_array($_POST['username'], $value)){
                $pesaneror = "<p>Click <a href=Registrasi.php>here</a> for Registrasi as ".$_POST['username']."</p>";
                $i++;
            }
        }
    }
    echo "<h4 id='red'>". $pesaneror ."</h4><style>#red{color:red;}fieldset{border:3px solid red;}</style>";
}
?>
    </form>
</body>
</html>