<?php
include "../classes/dbh.class.php";
include "../classes/pembayaran.class.php";

$pembayaranObj = new pembayaran();
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "input") {
    $id_pembayaran = $_POST["id_pembayaran"];
    $nim = $_POST['nim'];
    $tanggal = $_POST["tanggal"];
    $bank = $_POST["bank"];
    $nominal = $_POST["nominal"];
    $textimg = $_POST["textimg"];
    $namaimg = $_FILES['namaimg']['name'];
    $ukuran	= $_FILES['namaimg']['size'];
		$file_tmp = $_FILES['namaimg']['tmp_name'];
    $path = '../img/uploads/';
    $target_file = $path . basename($namaimg);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["namaimg"]["tmp_name"]);
    $target = $path.basename($namaimg);
    if($check !== false) {
      if($ukuran<1500024){
        if (move_uploaded_file($_FILES['namaimg']['tmp_name'], $target)) {
          echo "<script> alert('Image uploaded successfully')</script>";
          $pembayaranObj->addPembayaran($id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim);
        }else{
          echo "<script> alert('Image uploaded failed...')</script>";
        }
      }else{
        echo "<script> alert('Image uploaded failed...')</script>";
      }
    } 
}else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
  $oldId = $_POST["oldId"];
  $id_pembayaran = $_POST["id_pembayaran"];
  $nim = $_POST['nim'];
  $tanggal = $_POST["tanggal"];
  $bank = $_POST["bank"];
  $nominal = $_POST["nominal"];
  $textimg = $_POST["textimg"];
  $namaimg = $_FILES['namaimg']['name'];
  $ukuran	= $_FILES['namaimg']['size'];
  $file_tmp = $_FILES['namaimg']['tmp_name'];
  $path = '../img/uploads/';
  $target_file = $path . basename($namaimg);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["namaimg"]["tmp_name"]);
  $target = $path.basename($namaimg);
  if($check !== false) {
    if($ukuran<1500024){
      if (move_uploaded_file($_FILES['namaimg']['tmp_name'], $target)) {
        echo "<script> alert('Image uploaded successfully')</script>";
        $pembayaranObj->updatePembayaran($id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim, $oldId);
      }else{
        echo "<script> alert('Image uploaded failed...')</script>";
      }
    }else{
      echo "<script> alert('Image uploaded failed...')</script>";
    }
  } 
} 
else if ($_GET['aksi'] == "hapus") {
    $id =$_GET['id_pembayaran'];
    $pembayaranObj->removePembayaran($id);
} 
header("Location: ../index.php?f=payment_index");

