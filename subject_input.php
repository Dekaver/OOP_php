<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input Mata Kuliah</title>
</head>

<body>
    <h1>Input Data mata kuliah</h1>
    <form action="controllers/subjectcontroll.inc.php" method="post">
    <input type="hidden" name="aksi" value="input">
        <table>
            <tr>
                <td>Nama mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="nama_matakuliah" ></td>
            </tr>
            <tr>
                <td>Kode mata kuliah</td>
                <td>:</td>
                <td><input type="text" name="kode_matakuliah"></td>
            </tr>
            <tr>
            <td>Jumlah sks</td>
                <td>:</td>
                <td><input type="number" name="sks"></td>
            </tr>
            <td>Semester</td>
                <td>:</td>
                <td><input type="number" name="semester"></td>
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