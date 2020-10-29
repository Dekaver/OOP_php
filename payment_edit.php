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
         $mysqli = new mysqli("localhost", "root", "", "prowebif");
         
         $sql = "SELECT * FROM mahasiswa where nim='".$_GET['nim']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1>Edit Data Mahasiswa</h1>
    <div class="content">
    <form action="student_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama']; ?>"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim"  value="<?php echo $row['nim']; ?>"></td>
            </tr>
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
                <td>jenis kelamin</td>
                <td>:</td>
                <td><input type="radio" name="jenis kelamin" value="laki-laki">Laki-laki
                    <input type="radio" name="jenis kelamin" value="perempuan">Perempuan</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" cols="30" rows="10"><?php echo $row['alamat']; ?></textarea></td>
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