<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dosen</title>
</head>

<body>
    <h1>Data Dosen</h1>
    <div class="content">
    <a id="btn-plus" href="?f=dosen_input">+ Data Dosen</a>
    <br>
    <br>

    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
        
		//menjalankan query mysql
        $sql = "SELECT nip, nama_dsn, nama_prodi, pendidikan, alamat_dsn FROM dosen INNER JOIN program_studi ON dosen.id_prodi = program_studi.id" ;
        $result = $mysqli->query($sql);
        if ($_SESSION["username"]=='admin'){
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
            //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
            if ($result->num_rows > 0) {
                // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["nip"] . "</td>
                        <td>" . $row["nama_dsn"] . "</td>
                        <td>" . $row["nama_prodi"] . "</td>
                        <td>" . $row["pendidikan"] . "</td>
                        <td>" . $row["alamat_dsn"] . "</td>
                        <td><a href='?f=dosen_edit&&nip=" . $row["nip"] . "'>Edit</a>||<a href='dosen_proses.php?aksi=hapus&&nip=" . $row["nip"] . "'>Hapus</a>
                    </tr>";
                }
            } else {
                echo "0 results";
            }

            echo "</tbody>
                <tfoot>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                </table>";
        } else{
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>';
            //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
            if ($result->num_rows > 0) {
                // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["nip"] . "</td>
                        <td>" . $row["nama_dsn"] . "</td>
                        <td>" . $row["nama_prodi"] . "</td>
                        <td>" . $row["pendidikan"] . "</td>
                        <td>" . $row["alamat_dsn"] . "</td>
                    </tr>";
                }
            } else {
                echo "0 results";
            }

            echo "</tbody>
                <tfoot>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>
                    </tr>
                </tfoot>
                </table>";
        }
        
        $mysqli->close();
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>