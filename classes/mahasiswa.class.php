<?php

class mahasiswa extends Dbh{

    public function getNim(){
        $sql = "SELECT nim FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["nim"] . '<br>';
        }
    }

    public function getNama(){
        $sql = "SELECT nama_mhs FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["nama_mhs"] . '<br>';
        }
    }

    public function getProdi(){
        $sql = "SELECT id_prodi FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["id_prodi"] . '<br>';
        }
    }
    
    public function getDosenwali(){
        $sql = "SELECT dosenwali FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["dosenwali"] . '<br>';
        }
    }
    public function getJeniskelamin(){
        $sql = "SELECT jenis_kelamin FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["jenis_kelamin"] . '<br>';
        }
    }
    public function getPembayaran(){
        $sql = "SELECT id_pembayaran FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["id_pembayaran"] . '<br>';
        }
    }
    public function getTahunmasuk(){
        $sql = "SELECT tahunmasuk FROM mahasiswa";
        $st = $this->connect()->query($sql);
        while($row = $st->fetch()){
            echo $row["tahunmasuk"] . '<br>';
        }
    }

    public function addRow($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran){
        $sql = "INSERT INTO mahasiswa(nim, nama_mhs, id_prodi, alamat_mhs, dosenwali, tahunmasuk, jenis_kelamin, id_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, null]);
    }

    
}
