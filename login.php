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
                        <input class="reset" type="reset" value="Reset"></td>
                </tr>
            </table>
        </fieldset>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = new mysqli("localhost", "root", "", "prowebif");
    $sql = "SELECT * FROM user where username='" . $_POST['username'] . "' and password='" . $_POST['password'] . "'";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $row['password'];
            header("Location: index.php");
        }
    } else {
        echo "<h4 id='red'>Incorrect Password or Username</h4><style>#red{color:red;}fieldset{border:3px solid red;}</style>";
    }
}
?>
    </form>
    


</body>
</html>