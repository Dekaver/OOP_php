<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
</head>

<body>
<h1>Data Mata Kuliah</h1>
<div class="content">
    
    <a href="?f=subject_input">+ Data Mahasiswa</a>
    <br>
    <br>

    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
		//membuat objek mysql
        $mysqli = new mysqli("localhost", "root", "", "prowebif");

        //mengecek apakah sudah terkoneksi ke database mysql atau belum
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }

		//menjalankan query mysql
        $sql = "SELECT * FROM matakuliah";
        $result = $mysqli->query($sql);
        if($_SESSION["username"]=='admin'){
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                </tbody>';
                
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["kode_matakuliah"] . "</td>
                        <td>" . $row["nama_matakuliah"] . "</td>
                        <td>" . $row["sks"] . "</td>
                        <td>" . $row["semester"] . "</td>
                        <td><a href='?f=subject_edit&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Edit</a>||<a href='subject_proses.php?aksi=hapus&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Hapus</a>
                    </tr>";
                }
            } else {
                echo "0 Data";
            }
            echo "</tbody>
                <tfoot>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Aksi</th>
                    </tr>
                </tfoot>
                </table>";
        }else{
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                </tbody>';
                
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["kode_matakuliah"] . "</td>
                        <td>" . $row["nama_matakuliah"] . "</td>
                        <td>" . $row["sks"] . "</td>
                        <td>" . $row["semester"] . "</td>
                    </tr>";
                }
            } else {
                echo "0 Data";
            }
            echo "</tbody>
                <tfoot>
                    <tr>
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Semester</th>
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