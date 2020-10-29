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
         
         $sql = "SELECT nip, nama_dsn, id_prodi, pendidikan, alamat_dsn, nama_prodi FROM dosen INNER JOIN program_studi ON dosen.id_prodi=program_studi.id where nip='".$_GET['nip']."'";
         $result = $mysqli->query($sql);
         $row = $result->fetch_assoc()
    ?>
    <h1>Edit Data Dosen</h1>
    <div class="content">
    <form action="dosen_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="oldnip" value="<?php echo $row['nip']; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $row['nama_dsn']; ?>"></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="text" name="nip"  value="<?php echo $row['nip']; ?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi">
                        <option value="<?php echo $row['id_prodi']; ?>"><?php echo $row['nama_prodi']; ?></option>
                        <?php
                        $sql2 = "SELECT id, nama_prodi FROM program_studi";
                        $result2 = $mysqli->query($sql2);
                        if ($result2->num_rows > 0) {
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<option value=" . $row2["id"] . ">" . $row2["nama_prodi"] . "</option>";
                            }
                        } else {
                            echo "<option value='0'>None</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Pendidikan Terkahir</td>
                <td>:</td>
                <td><input type="radio" name="pendidikan" value="S2">S2
                    <input type="radio" name="pendidikan" value="S3">S3</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" cols="30" rows="10"><?php echo $row['alamat_dsn']; ?></textarea></td>
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