<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Input Data Mahasiswa</h1>
    <form action="student_proses.php" method="post">
    <input type="hidden" name="aksi" value="input">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="namamhs"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi">
                        <option value="" selected disabled hidden>--Pilih--</option>
                        <?php
                        $sql = "SELECT id, nama_prodi FROM program_studi";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=" . $row["id"] . ">" . $row["nama_prodi"] . "</option>";
                            }
                        } else {
                            echo "<option value='-'>Tidak ada data</option>";
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
                        <option value="" selected disabled hidden>--Pilih--</option>
                        <?php
                        $sql = "SELECT nip, nama_dsn FROM dosen";
                        $result = $mysqli->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value=" . $row["nip"] . ">" . $row["nip"] . " - " . $row["nama_dsn"] . "</option>";
                            }
                        } else {
                            echo "<option value='-'>Tidak ada data</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Tahun masuk</td>
                <td>:</td>
                <td><input type="number" name="tahunmasuk"></td>
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