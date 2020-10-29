
<body>
    <?php
    $mahasiswaObj = new mahasiswa();
    $programstudiObj = new programstudi();
    $dosenObj = new dosen();
    $nim = $_GET['nim'];
    


    ?>
    <h1>Input Data Mahasiswa</h1>
    <form action="controllers\studentcontroll.inc.php" method="post">
    <input type="hidden" name="aksi" value="edit">
    <input type="hidden" name="oldnim" value="<?php echo $nim; ?>">
        <table>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="namamhs" value="<?php echo $mahasiswaObj->getNama($nim)?>"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" value="<?php echo $nim?>"></td>
            </tr>
            <tr>
                <td>Program Studi</td>
                <td>:</td>
                <td>
                    <select name="prodi">
                        <option value="<?php echo $mahasiswaObj->getIdProdi($nim)?>"><?php echo $programstudiObj->getNama($mahasiswaObj->getIdProdi($nim))?></option>
                        <?php
                        $result = $programstudiObj->getProgramstudi();
                        foreach ($result as $row){
                            if ($mahasiswaObj->getIdProdi($nim) != $row["id"]){
                                echo "<option value=" . $row["id"] . ">" . $row["nama_prodi"] . "</option>";
                            }
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
                    <option value="<?php echo $mahasiswaObj->getIdDosenwali($nim)?>"><?php echo $dosenObj->getNama($mahasiswaObj->getIdDosenwali($nim))?></option>
                        <?php
                        $result = $dosenObj->getDosen();
                        foreach ($result as $row){
                            if ($mahasiswaObj->getIdDosenwali($nim) != $row["nip"]){
                                echo "<option value=" . $row["nip"] . ">" . $row["nama_dsn"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat" cols="30" rows="10" value="<?php echo $mahasiswaObj->getAlamat($nim)?>"><?php echo $mahasiswaObj->getAlamat($nim)   ?></textarea></td>
            </tr>
            <tr>
                <td>Tahun masuk</td>
                <td>:</td>
                <td><input type="number" name="tahunmasuk" value="<?php echo $mahasiswaObj->getTahunmasuk($nim)?>"></td>
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