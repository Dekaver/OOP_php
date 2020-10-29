<body>
    <h1>Input Data Mahasiswa</h1>
    <form action="controllers\studentcontroll.inc.php" method="post">
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
                        $prodiObj = new programstudi();
                        $result = $prodiObj->getProgramstudi();
                        foreach ($result as $row){
                            echo "<option value=" . $row["id"] . ">" . $row["nama_prodi"] . "</option>";
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
                        $dosenObj = new dosen();
                        $result = $dosenObj->getDosen();
                        foreach ($result as $row){
                            echo "<option value=" . $row["nip"] . ">" . $row["nip"] . " - " . $row["nama_dsn"] . "</option>";
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