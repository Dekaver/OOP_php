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
    <?php 
    if ($_SESSION['hakAkses']=='admin'){
        echo '<a href="?f=dosen_input">+ Data Dosen</a><br>';
    }
    ?>
    
    
    <br>
    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
        $dosenObj = new dosen();
        $result = $dosenObj->getDosen();
        if ($_SESSION["username"]){
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>';
            if ($_SESSION['hakAkses']=='admin'){
                echo '<th>Aksi</th>';
            }
            echo '</tr>
                </thead>
                <tbody>';
            $programstudiObj = new programstudi();
            foreach($result as $row){
                
                echo "<tr>
                    <td>" . $row["nip"] . "</td>
                    <td>" . $row["nama_dsn"] . "</td>
                    <td>" . $programstudiObj->getNama($row["id_prodi"]) . "</td>
                    <td>" . $row["pendidikan"] . "</td>
                    <td>" . $row["alamat_dsn"] . "</td>";
                if ($_SESSION['hakAkses']=='admin'){
                    echo "<td><a href='?f=dosen_edit&&nip=" . $row["nip"] . "'>Edit</a>||<a href='controllers/dosencontroll.inc.php?aksi=hapus&&nip=" . $row["nip"] . "'>Hapus</a>";
                }
                
                echo "</tr>";
            }
                           
            echo "</tbody>
                <tfoot>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Program studi</th>
                        <th>Pendidikan</th>
                        <th>Alamat</th>";
            if ($_SESSION['hakAkses']=='admin'){
                echo '<th>Aksi</th>';
            }
            echo        "</tr>
                </tfoot>
                </table>";
        }

    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>