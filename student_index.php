<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>

<body>
<h1>Data Mahasiswa</h1>
    <div class="content">
    
    <a href="?f=student_input">+ Data mahasiswa</a>
    <?php
	
    if (isset($_SESSION["username"])) {
        $mahasiswaObj = new mahasiswa();
        $result = $mahasiswaObj->getMahasiswa();
        echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Program Studi</th>
                    <th>Jenis Kelamin</th>
                    <th>Tahun Masuk</th>
                    <th>Dosen Wali</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        
        $no=1;
        // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
        foreach ($result as $row) {
            echo "<tr>
                <td>" . $no++ . "</td>
                <td>" . $row["nim"] . "</td>
                <td>" . $row["nama_mhs"] . "</td>
                <td>" . $row["id_prodi"] . "</td>
                <td>" . $row["jenis_kelamin"] . "</td>
                <td>" . $row["tahunmasuk"] . "</td>
                <td>" . $row["dosenwali"] . "</td>
                <td>" . $row["alamat_mhs"] . "</td>
                <td><a href='?f=student_edit&&nim=" . $row["nim"] . "'>Edit</a>||<a href='student_proses.php?aksi=hapus&&nim=" . $row["nim"] . "'>Hapus</a>
            </tr>";
        }
        
        echo "<tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Program Studi</th>
                <th>Jenis Kelamin</th>
                <th>Tahun Masuk</th>
                <th>Dosen Wali</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        </table>";
        
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>