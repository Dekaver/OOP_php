<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Document</title>
</head>

<body>

    <?php 
         $mysqli = new mysqli("localhost", "root", "", "database");
         
         $sql = "SELECT * FROM mata_kuliah where nip='".$_GET['nip']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1></h1>
    <div class="content">
    <form action="lecturer_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <table>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi">
                        <option value="Informatika">Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Matematika">Matematika</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit">
                    <input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    </div>
</body>
</html>