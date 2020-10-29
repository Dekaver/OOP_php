<?php

class test extends Dbh{
    public function getUsers(){
        $sql = "SELECT * FROM mahasiswa";
        $stmt = $this->connect()->query($sql);
        while($row = $stmt->fetch()){
            if ($row["nim"]=='11181007'){
                echo $row['nama_mhs'] .'<br>';
            }
        }
    }
    
}