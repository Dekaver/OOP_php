<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "prowebif");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];
	
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO dosen (nip, nama_dsn, id_prodi, pendidikan, alamat_dsn) VALUES ('$nip', '$nama', '$prodi', '$pendidikan', '$alamat')";
    $result = $mysqli->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];

    $query = "UPDATE dosen SET nip='$nip', nama_dsn='$nama', prodi=' $prodi', pendidikan='$pendidikan', alamat_dsn='$alamat' WHERE nip='$nip'";
    $result = $mysqli->query($query);
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM dosen WHERE nip='" . $_GET['nip'] . "'";

    $result = $mysqli->query($query);
} 
    

header("Location: index.php?f=lecturer_index");
$mysqli->close();
