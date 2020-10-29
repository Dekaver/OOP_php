<?php

include '../classes/dbh.class.php';
include "../classes/dosen.class.php";


$dosenObj = new dosen();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];
	$dosenObj->addDosen($nip, $nama, $prodi, $alamat, $pendidikan);

} else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
    $nip = $_POST["nip"];
    $nama = $_POST["nama"];
    $prodi = $_POST["prodi"];
    $pendidikan = $_POST["pendidikan"];
    $alamat = $_POST["alamat"];
    $oldnip = $_POST["oldnip"];
    $dosenObj->updateDosen($nip, $nama, $prodi, $alamat, $pendidikan, $oldnip);

} else if ($_GET['aksi'] == "hapus" ) {
    $nip = $_GET['nip'];
    $dosenObj->removeDosen($nip);
}


header("Location: ../index.php?f=dosen_index");
?>