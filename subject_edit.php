<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit data mata kuliah</title>
</head>

<body>
    <?php 
         $mysqli = new mysqli("localhost", "root", "", "prowebif");
         
         $sql = "SELECT * FROM matakuliah where kode_matakuliah='".$_GET['kode_matakuliah']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <div class="content">
    <h1>Edit Data mata kuliah</h1>
    <form action="subject_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <table>
            <tr>
                <td>Nama mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="nama_matakuliah" value="<?php echo $row['nama_matakuliah']; ?>"></td>
            </tr>
            <tr>
                <td>Kode mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="kode_matakuliah"  value="<?php echo $row['kode_matakuliah']; ?>"></td>
            </tr>
            <tr>
            <td>Jumlah sks</td>
                <td>:</td>
                <td><input type="number" name="sks"  value="<?php echo $row['sks']; ?>"></td>
            </tr>
            <td>Semester</td>
                <td>:</td>
                <td><input type="number" name="semester"  value="<?php echo $row['semester']; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit">
                    <input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    <div class="content">
</body>
</html>