<!DOCTYPE html>
<html lang="en">
<body>
    <h1>FRS</h1>
    <div class="content">
    <?php
    
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
        
        $user = $_SESSION["username"];
        
        $result = $mysqli->query($sql);
        echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
		//mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        if ($result->num_rows > 0) {
            // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["kode_mk"] . "</td>
                    <td>" . $row["nama_matakuliah"] . "(" . $row["kelas"] . ")</td>
                    <td>" . $row["sks"] . "</td>
                    <td><a href='frs_proses.php?aksi=hapus&&kode_matakuliah=" . $row["kode_mk"] . "'>Hapus</a>
                  </tr>";
            }
        } else {?>
            <td>---</td>
            <td>---</td>
            <td>---</td>
            <td>---</td>
        <?php
        }
        ?>
        </tbody>
        </table>
        <?php
    }else{
        header("Location: login.php");
    }
    ?>
    <br>
    <form action="frs_proses" method="post"></form>
    <input type="hidden" name="aksi" value="input">
        <select name="kode_matakuliah">
            <?php
            $sql = "SELECT kode_matakuliah, nama_matakuliah, kelas FROM matakuliah INNER JOIN pengajar ON matakuliah.kode_matakuliah=pengajar.kode_mk";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row["kode_matakuliah"] . ">" . $row["nama_matakuliah"] . "(" . $row["kelas"] . ")</option>";
                }
            } else {
                echo "<option value=''>None</option>";
            }
            ?>
        </select>
        <input type="hidden" name="">
        <input type="submit" value="Submit">
    </form>
    </div>

    
</body>
</html>