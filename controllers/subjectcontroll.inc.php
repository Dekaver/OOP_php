<?php
require '../classes/dbh.class.php';
require '../classes/matakuliah.class.php';
$matakuliahObj = new matakuliah();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matakuliah = $_POST["nama_matakuliah"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
    $matakuliahObj->addMatakuliah($kode_matakuliah, $nama_matakuliah, $sks, $semester);
    
} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $oldkode_matakuliah = $_POST['oldkode_matakuliah'];
    $kode_matakuliah = $_POST["kode_matakuliah"];
    $nama_matakuliah = $_POST["nama_matakuliah"];
    $sks = $_POST["sks"];
    $semester = $_POST["semester"];
    $matakuliahObj->updateMatakuliah($kode_matakuliah, $nama_matakuliah, $sks, $semester, $oldkode_matakuliah);
    
} else if ($_GET['aksi'] == "hapus") {
    $kode_matakuliah = $_GET['kode_matakuliah'];
    $matakuliahObj->removeMatakuliah($kode_matakuliah);
} 
header("Location: ../index.php?f=subject_index");

