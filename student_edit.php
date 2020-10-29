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
         
         $sql = "SELECT nama_mhs, nim, id_prodi, nama_prodi, jenis_kelamin, alamat_mhs, tahunmasuk 
                 FROM mahasiswa INNER JOIN program_studi 
                 on mahasiswa.id_prodi=program_studi.id 
                 where nim=" . $_GET['nim'] . "";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1>Input Data Mahasiswa</h1>
    <form action="student_proses.php" method="post">
    <input type="hidden" name="aksi" value="edit">
    <input type="hidden" name="oldnim" value="<?php echo $row['nim']; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="namamhs" value="<?php echo $row["nama_mhs"]?>"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $row["nim"]?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi">
                        <option value="<?php echo $row["id_prodi"]?>"><?php echo $row["nama_prodi"]?></option>
                        <?php
                        $sql2 = "SELECT id, nama_prodi FROM program_studi";
                        $result2 = $mysqli->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<option value=" . $row2["id"] . ">" . $row2["nama_prodi"] . "</option>";
                            }
                        } else {
                            echo "<option value='-'>None</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><input type="radio" name="jenis_kelamin" value="laki-laki">Laki-Laki
                    <input type="radio" name="jenis_kelamin" value="perempuan">Perempuan</td>
            </tr>
            <tr>
                <td>Dosen Wali</td>
                <td>:</td>
                <td>
                    <select name="dosenwali">
                        <?php
                        $sql4 = "SELECT nip, nama_dsn FROM mahasiswa INNER JOIN dosen where nim=" . $_GET['nim'] . "";
                        $result4 = $mysqli->query($sql4);
                        $row4 = $result4->fetch_assoc();
                        ?>
                        <option value="<?php echo $row4["nip"]?>"><?php echo $row4["nama_dsn"]?></option>
                        <?php
                        $sql3 = "SELECT nip, nama_dsn FROM dosen";
                        $result3 = $mysqli->query($sql3);
                        if ($result3->num_rows > 0) {
                            while ($row3 = $result3->fetch_assoc()) {
                                echo "<option value=" . $row3["nip"] . ">" . $row3["nip"] . " - " . $row3["nama_dsn"] . "</option>";
                            }
                        } else {
                            echo "<option value='-'>None</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" cols="30" rows="10" value="<?php echo $row["alamat_mhs"]?>"><?php echo $row["alamat_mhs"]?></textarea></td>
            </tr>
            <tr>
                <td>Tahun masuk</td>
                <td>:</td>
                <td><input type="number" name="tahunmasuk" value="<?php echo $row["tahunmasuk"]?>"></td>
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