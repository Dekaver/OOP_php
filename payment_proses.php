<?php
session_start();
//membuat objek database mysql dengan format (link_server, username_mysql, password_mysql, database_mysql)
$mysqli = new mysqli("localhost", "root", "", "prowebif");

//setiap request yang datang akan dicek methodnya apakah post atau get. 
//$_POST['aksi'] valuenya diperoleh dari tag <input type="hidden" value=""> karena kl metod post, data yang dikirim dr suatu form, tdk ditampilkan di url/link.
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['aksi'] == "inputmhs") {
    $date = $_POST["date"];
    $bank = $_POST["bank"];
    $nominal = $_POST["nominal"];
    $textimg = $_POST["textimg"];
    $namaimg = $_FILES['namaimg']['name'];
    $id = date("mdhis");
  	if (isset($_POST['aksi'])) {
		$textimg = mysqli_real_escape_string($mysqli, $_POST['textimg']);
		$target = "img/uploads/".basename($namaimg);
        $query = "INSERT INTO pembayaran (tanggal, bank, nominal, nama_img, text_img, id_pembayaran) 
                  VALUES ('$date', '$bank', '$nominal', '$namaimg', '$textimg', '$id')";
		mysqli_query($mysqli, $query);

		if (move_uploaded_file($_FILES['namaimg']['tmp_name'], $target)) {
            echo "<script> alert('Image uploaded successfully')</script>";
        }else{
          echo "<script> alert('Image uploaded failed...')</script>";
        }
		$sql = "UPDATE `mahasiswa` SET `id_pembayaran` = '$id' WHERE `mahasiswa`.`nim` = '" . $_SESSION["username"] . "'";
		
		$result = $mysqli->query($sql);
	//eksekusi query mysql dalam hal ini input data ke tabel
    }
    
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
$mysqli->close();
