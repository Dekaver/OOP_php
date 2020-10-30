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
    $matakuliahObj = new matakuliah();
    
    ?>
    <div class="content">
    <h1>Edit Data mata kuliah</h1>
    <form action="controllers/subjectcontroll.inc.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="oldkode_matakuliah" value="<?php echo $_GET['kode_matakuliah'] ?>">
        <table>
            <tr>
                <td>Nama mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="nama_matakuliah" value="<?php echo $matakuliahObj->getNama($_GET['kode_matakuliah']) ?>"></td>
            </tr>
            <tr>
                <td>Kode mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="kode_matakuliah"  value="<?php echo $_GET['kode_matakuliah']; ?>"></td>
            </tr>
            <tr>
            <td>Jumlah sks</td>
                <td>:</td>
                <td><input type="number" name="sks"  value="<?php echo $matakuliahObj->getSks($_GET['kode_matakuliah']) ?>"></td>
            </tr>
            <td>Semester</td>
                <td>:</td>
                <td><input type="number" name="semester"  value="<?php echo $matakuliahObj->getSemester($_GET['kode_matakuliah']) ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit">
                    <input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    
</body>
</html>