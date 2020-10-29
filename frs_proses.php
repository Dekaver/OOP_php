<?php
//Tempat untuk mengeksekusi semua event baik itu input data, edit data dan hapus data.

//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "database");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $sql="SELECT kode_mk, kelas  FROM perkuliahan";
    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc()
    $kelas =$row["kelas"];
    $nim =$row["nim"];
    $kode_matakuliah = $_POST["kode_matakuliah"];
	//eksekusi query mysql dalam hal ini input data ke tabel
    $query = "INSERT INTO perkuliahan (nip, nim, kode_matakuliah) VALUES ('$nip', '$nim', '$kode_matakuliah')";
    $result = $mysqli->query($query);
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $nip = $_POST["nip"];
    $nim = $_POST["nim"];
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $query = "UPDATE perkuliahan SET nip='$nip',nim='$nim', kode_matakuliah='$kode_matakuliah' WHERE nip='$nip'";
    $result = $mysqli->query($query);
} else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM perkuliahan WHERE kode_mk='" . $_GET['kode_mk'] . "'";

    $result = $mysqli->query($query);
} 
header("Location: index.php?f=frsmhs_index");
$mysqli->close();
