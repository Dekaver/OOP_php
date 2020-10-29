<?php 
include "includes/class-autoload.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Proweb</title>
</head>
<body>
    <?php
    $tesObj = new mahasiswa();
    $tesObj->addRow("11181019", "bona A matanari", "11", "medan", '100001221211', "2018", "laki-laki", '1020034052');
    ?>


</body>
</html>