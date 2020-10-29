<!DOCTYPE html>
<html lang="en">

<body>
    <h1>Input Bukti Pembayaran</h1>
    <form action="payment_proses.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="aksi" value="inputmhs">
    <input type="hidden" name="post" value="1000000">
        <table>
            <tr>
                <td>date</td>
                <td>:</td>
                <td><input type="date" name="date"></td>
            </tr>
            <tr>
                <td>BANK</td>
                <td>:</td>
                <td><input type="text" name="bank"></td>
            </tr>

            <tr>
                <td>Nominal</td>
                <td>:</td> 
                <td>Rp. <input type="number" name="nominal"></td>
            </tr>
            <tr>
                <td>Upload Bukti</td>
                <td>:</td>
                <td><input type="file" name="namaimg"></td>
            </tr>
            <tr>
                <td>keterangan</td>
                <td>:</td>
                <td><textarea name="textimg" cols="30" rows="10" placeholder="optional"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit">
                    <input type="reset" value="Reset"></td>
            </tr>
        </table>
    </form>
    <?php
    // while ($row = mysqli_fetch_array($result)) {
    //   echo "<div id='img_div'>";
    //   	echo "<img src='images/".$row['image']."' >";
    //   	echo "<p>".$row['image_text']."</p>";
    //   echo "</div>";
    // }
  ?>
</body>
</html>