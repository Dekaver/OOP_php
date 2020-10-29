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
        if ($_SESSION['username']=='admin'){
            $sql = "SELECT  nim, nama_mhs, id_pembayaran";
            $result = $mysqli->query($sql);
            echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
            width="100%">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>';
            //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
            if ($result->num_rows > 0) {
                $no=1;
                // menampilkan hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $row["nim"] . "</td>
                        <td>" . $row["nama_mhs"] . "</td>"?>
                        <td>"<?php 
                                if (isset($row["id_pembayaran"])){
                                    echo "sudah";
                                } else{
                                    echo "belum";
                                } ?>"</td>
                        <?php "<td><a href='?f=payment_edit&&nim=" . $row["nim"] . "'>Edit</a>||<a href='payment_proses.php?aksi=hapus&&nim=" . $row["nim"] . "'>Hapus</a>
                    </tr>";
                }
            } else {
                echo "0 results";
            }
            echo "<tbody>
            </table>";
        }else{
            //menjalankan query mysql
            $sql = "SELECT nim, pembayaran.id_pembayaran, tanggal, bank, pembayaran.nama_img, `pembayaran`.`text_img`, nominal FROM mahasiswa INNER JOIN pembayaran 
            ON mahasiswa.id_pembayaran = pembayaran.id_pembayaran WHERE nim=" . $_SESSION["username"] . " ";
            $result = $mysqli->query($sql);

            //mengecek apakah tabel ada datanya atau tidak dengan kode num_rows
            if ($result->num_rows > 0) {
            //    hasil query data berdasarkan baris. nip, nama, prodi dll merujuk ke nama kolom karena kita pakai method fetch_assoc
            while ($row = mysqli_fetch_array($result)) {
            echo '<table id="pay">
            <tr>
                <td colspan="4" id="center">BUKTI PEMBAYARAN</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>:</td>
                <td>' . $row["id_pembayaran"] . '</td>
                <td rowspan="4"><img width="400px" src="img/uploads/'.$row['nama_img'].'" ></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td>' . $row['tanggal'] . '</td>
            </tr>
            <tr>
                <td>BANK</td>
                <td>:</td>
                <td>' . $row['bank'] . '</td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td>' . $row['nominal'] . '</td>
                
            </tr>

            ';
            }
            echo "</table>";

            } else {
            echo "
            <h1 style='color:red;'>ANDA BELUM BAYAR</h1>
            <a href='?f=payment_input'>Bayar...!</a>
            ";
            }
        }
		
        $mysqli->close();
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>