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
    <?php 
    if ($_SESSION['hakAkses']=='admin'){
        echo '<a href="?f=payment_input">+ Pembayaran</a><br>';
    }
    ?>
    
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
                    <th>No</th>
                    <th>Id pembayaran</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>Bank</th>
                    <th>Nominal</th>
                    <th>Nama Image</th>
                    <th>Text Image</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>';
        //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
        $mahasiswaObj = new mahasiswa();
        $no=1;
        foreach($result as $row){
            echo "<tr>
                <td>" . $no++ ."</td>
                <td>" . $row["id_pembayaran"] . "</td>
                <td>" . $row["tanggal"] . "</td>
                <td>" . $mahasiswaObj->getNama($row["nim"]) . "</td>
                <td>" . $row["bank"] . "</td>
                <td>" . $row["nominal"] . "</td>
                <td>" . $row["nama_img"] . "</td>
                <td>" . $row["text_img"] . "</td>
                <td><a href='?f=payment_edit&&id_pembayaran=" . $row["id_pembayaran"] . "'>Edit</a>||<a href='controllers/paymentcontroll.inc.php?aksi=hapus&&id_pembayaran=" . $row["id_pembayaran"] . "'>Hapus</a>
            </tr>";       
        }
        echo "<tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Id pembayaran</th>
                <th>Tanggal</th>
                <th>Nama</th>
                <th>Bank</th>
                <th>Nominal</th>
                <th>Nama Image</th>
                <th>Text Image</th>
                <th>Aksi</th>
        </tfoot>
        </table>";
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>