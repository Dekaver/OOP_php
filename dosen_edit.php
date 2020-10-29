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
    $dosenObj = new dosen();
    $programstudiObj = new programstudi();
    $nip = $_GET['nip'];
    ?>
    <h1>Edit Data Dosen</h1>
    <div class="content">
    <form action="dosen_proses.php" method="post">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="oldnip" value="<?php echo $nip; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $dosenObj->getNama($nip) ?>"></td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td><input type="text" name="nip"  value="<?php echo $nip ?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                <select name="prodi">
                        <option value="<?php echo $dosenObj->getIdProdi($nip)?>"><?php echo $programstudiObj->getNama($dosenObj->getIdProdi($nip))?></option>
                        <?php
                        $result = $programstudiObj->getProgramstudi();
                        foreach ($result as $row){
                            if ($dosenObj->getIdProdi($nip) != $row["id"]){
                                echo "<option value=" . $row["id"] . ">" . $row["nama_prodi"] . "</option>";
                            }
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
                <td><textarea name="alamat" cols="30" rows="10" value="<?php echo $dosenObj->getAlamat($nip) ?>"><?php echo $dosenObj->getAlamat($nip) ?></textarea></td>
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