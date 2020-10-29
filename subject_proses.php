<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek prowebif mysql dengan format (link_server, username_mysql, password_mysql, prowebif_mysql)
$mysqli = new mysqli("localhost", "root", "", "prowebif");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matakuliah = $_POST["nama_matakuliah"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
    
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO matakuliah (kode_matakuliah, nama_matakuliah, sks, semester) VALUES ('$kode_matakuliah', '$nama_matakuliah', '$sks', '$semester')";
    $result = $mysqli->query($query);
    
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matakuliah = $_POST["nama_matakuliah"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
    $query = "UPDATE matakuliah SET kode_matakuliah='$kode_matakuliah', nama_matakuliah='$nama_matakuliah', sks='$sks', semester='$semester' WHERE kode_matakuliah='$kode_matakuliah'";
    $result = $mysqli->query($query);
    
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM matakuliah WHERE kode_matakuliah='" . $_GET['kode_matakuliah'] . "'";

    $result = $mysqli->query($query);
} 
header("Location: index.php?f=subject_index");
$mysqli->close();
