<?php
include "../classes/dbh.class.php";
include "../classes/mahasiswa.class.php";
$mahasiswaObj = new mahasiswa();
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $nim = $_POST["nim"];
    $nama = $_POST["namamhs"];
    $prodi = $_POST["prodi"];
    $jeniskelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $dosenwali = $_POST["dosenwali"];
	$tahunmasuk = $_POST["tahunmasuk"];
    $mahasiswaObj->addMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin);

} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $oldnim = $_POST["oldnim"];
    $nim = $_POST["nim"];
    $nama = $_POST["namamhs"];
    $prodi = $_POST["prodi"];
    $jeniskelamin = $_POST["jenis_kelamin"];
    $alamat = $_POST["alamat"];
    $dosenwali = $_POST["dosenwali"];
    $tahunmasuk = $_POST["tahunmasuk"];
    $mahasiswaObj->updateMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $oldnim);
    
} else if ($_GET['aksi'] == "hapus") {
    $mahasiswaObj->removeMahasiswa($_GET['nim']);
} 
header("Location: ../index.php?f=student_index");

