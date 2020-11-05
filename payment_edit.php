<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php 
        $pembayaranObj = new pembayaran();
        $mahasiswaObj = new mahasiswa();
        $id = $_GET['id_pembayaran'];
    ?>
    <h1>Edit Pembayaran</h1>
    <div class="content">
    <form action="controllers/paymentcontroll.inc.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="aksi" value="edit">
        <input type="hidden" name="oldId" value="<?php echo $id ?>">
        <table>
            <tr>
                <td>Id Pembayaran</td>
                <td>:</td>
                <td><input type="text" name="id_pembayaran" value="<?php echo $id; ?>"></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td>
                    <select name="nim">
                    <option value="<?php echo $pembayaranObj->getNim($id); ?>"><?php echo $mahasiswaObj->getNama($pembayaranObj->getNim($id))?></option>
                        <?php
                        $result = $mahasiswaObj->getMahasiswa();
                        foreach ($result as $row){
                            if ($pembayaranObj->getNim($id) != $row["nim"]){
                                echo "<option value=" . $row["nim"] . ">" . $row["nama_mhs"] . "</option>";
                            }
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal" value="<?php echo $pembayaranObj->getTanggal($id); ?>"></td>
            </tr>
            <tr>
                <td>Bank</td>
                <td>:</td>
                <td><input type="text" name="bank"  value="<?php echo $pembayaranObj->getBank($id); ?>"></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td>:</td>
                <td><input type="text" name="nominal"  value="<?php echo $pembayaranObj->getNominal($id); ?>"></td>
            </tr>
            <tr>
                <td>Upload Bukti</td>
                <td>:</td>
                <td><input type="file" name="namaimg"></td>
            </tr>
            <tr>
            <td>Keterangan</td>
                <td>:</td>
                <td><textarea name="textimg" cols="30" rows="10" value="<?php echo $pembayaranObj->getTextimg($id)?>"><?php echo $pembayaranObj->getTextimg($id)?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="Submit"></td>
            </tr>
        </table>
    </form>
    <div class="content">
</body>
</html>