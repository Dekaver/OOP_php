<!DOCTYPE html>
<html lang="en">

<body>
    <?php 
        $pembayaranObj = new pembayaran();
        $mahasiswaObj = new mahasiswa();
    ?>
    <h1>Input Bukti Pembayaran</h1>
    <form action="payment_proses.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="aksi" value="inputmhs">
    <input type="hidden" name="post" value="1000000">
        <table>
        <tr>
                <td>Id Pembayaran</td>
                <td>:</td>
                <td><input type="text" name="id"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <select name="nim">
                        <option value="" selected disabled hidden>--Pilih--</option>
                        <?php
                        $result = $mahasiswaObj->getMahasiswa();
                        foreach ($result as $row){
                            echo "<option value=" . $row["nim"] . ">" . $row["nama_mhs"] . "</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>BANK</td>
                <td>:</td>
                <td><input type="text" name="bank"></td>
            </tr>
            <tr>
                <td>tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal"></td>
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
</body>
</html>