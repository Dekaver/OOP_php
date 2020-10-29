<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRS</title>
</head>

<body>
    <h1>FRS</h1>
    <div class="content">
  
    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
		//membuat objek mysql
        $mysqli = new mysqli("localhost", "root", "", "database");

        //mengecek apakah sudah terkoneksi ke database mysql atau belum
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

		//menjalankan query mysql
        $sql = "SELECT perkuliahan.kode_matakuliah, nama_matkul, sks, kelas  FROM perkuliahan 
                INNER JOIN mata_kuliah 
                INNER JOIN pengajar on mata_kuliah.kode_matakuliah = pengajar.kode_mk";
        $result = $mysqli->query($sql);
        echo "<table border=1>
            <tr>
                <th>Kode</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
            </tr>";
		//mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        if ($result->num_rows > 0) {
            // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
            while ($row = $result->fetch_assoc()) {
                echo "<tr>x
                    <td>" . $row["kode_matakuliah"] . "</td>
                    <td>" . $row["nama_matkul"] . "[" . $row["kelas"] . "]</td>
                    <td>" . $row["sks"] . "</td>
                    <td><a href='frs_proses.php?aksi=hapus&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Hapus</a>
                  </tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    }else{
        header("Location: login.php");
    }
    ?>
        <form action="frs_proses" method="post"></form>
    <input type="hidden" name="aksi" value="input">
        <select name="kode_matakuliah">
            <?php
            $sql = "SELECT kode_matakuliah, nama_matkul, kelas FROM mata_kuliah INNER JOIN pengajar ON mata_kuliah.kode_matakuliah=pengajar.kode_mk";
            $result = $mysqli->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value=" . $row["kode_matakuliah"] . ">" . $row["nama_matkul"] . "(" . $row["kelas"] . ")</option>";
                }
            } else {
                echo "<option value=''>None</option>";
            }
            ?>
        </select> 
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
    </div>

    
</body>

</html>