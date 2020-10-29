<?php

class matakuliah extends Dbh{

    public function getMatakuliah(){
        $sql = "SELECT * FROM matakuliah";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getKodeMataKuliah(){
        $sql = "SELECT kode_matakuliah FROM matakuliah";
        $st = $this->connect()->query($sql);
        $result = $st->fetch();
        return $result;
    }

    public function getNama($kode_matakuliah){
        $sql = "SELECT nama_matakuliah FROM matakuliah WHERE kode_matakuliah = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah]);
        $result = $st->fetch();
        return $result['nama_matakuliah'];
    }

    public function getSks($kode_matakuliah){
        $sql = "SELECT sks FROM matakuliah WHERE kode_matakuliah = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah]);
        $result = $st->fetch();
        return $result['sks'];
    }

    public function getSemester($kode_matakuliah){
        $sql = "SELECT semester FROM matakuliah WHERE kode_matakuliah = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah]);
        $result = $st->fetch();
        return $result['semester'];
    }
    
    public function addMatakuliah($kode_matakuliah, $nama, $sks, $semester){
        $sql = "INSERT INTO matakuliah(kode_matakuliah, nama_matakuliah, sks, semester) VALUES (?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah, $nama, $sks, $semester]);
    }

    public function removeMatakuliah($kode_matakuliah){
        $sql = "DELETE FROM matakuliah WHERE kode_matakuliah = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah]);
    }

    public function updateMatakuliah($kode_matakuliah, $nama, $sks, $semester, $oldkode_matakuliah){
        $sql = "UPDATE matakuliah SET kode_matakuliah = ?, nama_matakuliah = ?, sks = ?, semester=? WHERE kode_matakuliah='$oldkode_matakuliah'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$kode_matakuliah, $nama, $sks, $semester]);
    }

    
}
