<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mata Kuliah</title>
</head>

<body>
<h1>Data Mata Kuliah</h1>
<div class="content">
    
    <a href="?f=subject_input">+ Data Mahasiswa</a>
    <br>

    <?php
    $matakuliahObj = new matakuliah();
    $result = $matakuliahObj->getMatakuliah();
	
    if (isset($_SESSION["username"])) {
		
        echo '<table border=1 id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"
        width="100%">
            <thead>
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            </tbody>';
            
        
            foreach ($result as $row) {
                echo "<tr>
                    <td>" . $row["kode_matakuliah"] . "</td>
                    <td>" . $row["nama_matakuliah"] . "</td>
                    <td>" . $row["sks"] . "</td>
                    <td>" . $row["semester"] . "</td>
                    <td><a href='?f=subject_edit&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Edit</a>||<a href='controllers/subjectcontroll.inc.php?aksi=hapus&&kode_matakuliah=" . $row["kode_matakuliah"] . "'>Hapus</a>
                </tr>";
            }
        
        echo "</tbody>
            <tfoot>
                <tr>
                    <th>Kode Mata Kuliah</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
            </table>";
        
    }else{
        header("Location: login.php");
    }
    ?>
    </div>
</body>

</html>