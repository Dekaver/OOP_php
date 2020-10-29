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

    protected function getNama($nip){
        $sql = "SELECT nama_dsn FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['nama_dsn'];
    }

    protected function getAlamat($nip){
        $sql = "SELECT alamat_dsn FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['alamat_dsn'];
    }

    protected function getIdProdi($nip){
        $sql = "SELECT id_prodi FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['id_prodi'];
    }
    
    protected function getPendidikan($nip){
        $sql = "SELECT pendidikan FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
        $result = $st->fetch();
        return $result['pendidikan'];
    }
    
    protected function setDosen($nip, $nama, $prodi, $alamat, $pendidikan){
        $sql = "INSERT INTO dosen(nip, nama_dsn, id_prodi, alamat_dsn, pendidikan, tahunmasuk, jenis_kelamin, id_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip, $nama, $prodi, $alamat, $pendidikan]);
    }

    protected function removeDosen($nip){
        $sql = "DELETE FROM dosen WHERE nip = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip]);
    }

    protected function changeDosen($nip, $nama, $prodi, $alamat, $pendidikan, $oldnip){
        $sql = "UPDATE dosen SET nip = ?, nama_dsn = ?, id_prodi = ?, jenis_kelamin = ?, alamat_dsn=?, pendidikan=?, tahunmasuk=?, id_pembayaran=? WHERE nip='$oldnip'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nip, $nama, $prodi, $alamat, $pendidikan]);
    }

    
}
