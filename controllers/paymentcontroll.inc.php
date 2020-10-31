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
    $path = '../img/uploads/';
    $target_file = $path . basename($namaimg);
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["aksi"])) {
      $check = getimagesize($_FILES["namaimg"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }

    $pembayaranObj->addPembayaran($id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim);
    // $pembayaranObj->uploadImg($namaimg,$textimg,$path);
		

}else if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "edit") {
  $date = $_POST["date"];
    $nominal = $_POST["nominal"];
    $text_img = $_POST["text_img"];

    $query = "UPDATE mahasiswa SET date='$date', bank='$bank', nominal=' $nominal', jenis_kelamin='$namaimg', tetextimg$text_img' WHERE ida'";
    $result = $mysqli->query($query);
} 
else if ($_GET['aksi'] == "hapus") {
    $query = "DELETE FROM mahasiswa WHERE date='" . $_GET['date'] . "'";

    $result = $mysqli->query($query);
} 
// header("Location: index.php?f=payment_index");

