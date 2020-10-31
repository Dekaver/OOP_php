<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
</head>

<body>
<h1>Data Pembayaran</h1>
    <div class="content">
    
    
    <br>
    <?php
	// Cek sudah login atau belum, kalau belum akan diredirect ke page logi. Penjelasan kode ini ada di file index.php
    if (isset($_SESSION["username"])) {
		//membuat objek mysql
        $pembayaranObj = new pembayaran();
        $result = $pembayaranObj->getPembayaran();
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">

                <thead>
                    <tr>
                        <th>Id pembayaran</th>
                        <th>Nim</th>
                        <th>Tanggal</th>
                        <th>Bank</th>
                        <th>Nominal</th>
                        <th>Nama Image</th>
                        <th>Text Image</th>
                    </tr>
                </thead>
                <tbody>';
            //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
            $MahasiswaObj = new mahasiswa();
            foreach($result as $row){
                $no=1;
                
                    echo "<tr>
                    <td>" . $row["id_pembayaran"] . "</td>
                    <td>" . $row["tanggal"] . "</td>
                    <td>" . $mahasiswaObj->getNama($row["nim"]) . "</td>
                    <td>" . $row["bank"] . "</td>
                    <td>" . $row["nominal"] . "</td>
                    <td>" . $row["nama_img"] . "</td>
                    <td>" . $row["text_img"] . "</td>
                    <td>" . $row["nim"] . "</td>
                    <td><a href='?f=dosen_edit&&nip=" . $row["nip"] . "'>Edit</a>||<a href='controllers/pembayarancontroll.inc.php?aksi=hapus&&nip=" . $row["nip"] . "'>Hapus</a>
                </tr>";
                   
                }
            
            echo "<tbody>
            <tfoot>
                <tr>
                         <th>Id pembayaran</th>
                        <th>Nim</th>
                        <th>Tanggal</th>
                        <th>Bank</th>
                        <th>Nominal</th>
                        <th>Nama Image</th>
                        <th>Text Image</th>
            </tfoot>
            </table>";
        
		
        
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>