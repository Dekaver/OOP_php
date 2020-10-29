<?php

class dosen extends Dbh{

    public function getDosen(){
        $sql = "SELECT * FROM dosen";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getNip(){
        $sql = "SELECT nip FROM dosen";
        $st = $this->connect()->query($sql);
        $result = $st->fetch();
        return $result;
    }

    public function getNama($nip){
        $sql = "SELECT nama_dsn FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['nama_dsn'];
    }

    public function getAlamat($nip){
        $sql = "SELECT alamat_dsn FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['alamat_dsn'];
    }

    public function getIdProdi($nip){
        $sql = "SELECT id_prodi FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['id_prodi'];
    }
    
    public function getPendidikan($nip){
        $sql = "SELECT pendidikan FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['pendidikan'];
    }
    
    public function addDosen($nip, $nama, $prodi, $alamat, $pendidikan){
        $sql = "INSERT INTO dosen(nip, nama_dsn, id_prodi, alamat_dsn, pendidikan) VALUES (?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip, $nama, $prodi, $alamat, $pendidikan]);
    }

    public function removeDosen($nip){
        $sql = "DELETE FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
    }

    public function updateDosen($nip, $nama, $prodi, $alamat, $pendidikan, $oldnip){
        $sql = "UPDATE dosen SET nip = ?, nama_dsn = ?, id_prodi = ?, alamat_dsn=?, pendidikan=? WHERE nip='$oldnip'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip, $nama, $prodi, $alamat, $pendidikan]);
    }
}
