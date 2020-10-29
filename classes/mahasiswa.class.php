<?php

class mahasiswa extends Dbh{

    public function getMahasiswa(){
        $sql = "SELECT * FROM mahasiswa";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getNim(){
        $sql = "SELECT nim FROM mahasiswa";
        $st = $this->connect()->query($sql);
        $result = $st->fetch();
        return $result;
    }

    protected function getNama($nim){
        $sql = "SELECT nama_mhs FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['nama_mhs'];
    }

    protected function getAlamat($nim){
        $sql = "SELECT alamat_mhs FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['alamat_mhs'];
    }

    protected function getIdProdi($nim){
        $sql = "SELECT id_prodi FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['id_prodi'];
    }
    
    protected function getIdDosenwali($nim){
        $sql = "SELECT dosenwali FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['dosenwali'];
    }
    protected function getJeniskelamin($nim){
        $sql = "SELECT jenis_kelamin FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['jenis_kelamin'];
    }
    protected function getIdPembayaran($nim){
        $sql = "SELECT id_pembayaran FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['id_pembayaran'];
    }
    protected function getTahunmasuk($nim){
        $sql = "SELECT tahunmasuk FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['tahunmasuk'];
    }

    protected function setMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran){
        $sql = "INSERT INTO mahasiswa(nim, nama_mhs, id_prodi, alamat_mhs, dosenwali, tahunmasuk, jenis_kelamin, id_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran]);
    }

    protected function removeMahasiswa($nim){
        $sql = "DELETE FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);

    }

    protected function changeMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran, $oldnim){
        $sql = "UPDATE mahasiswa SET nim = ?, nama_mhs = ?, id_prodi = ?, jenis_kelamin = ?, alamat_mhs=?, dosenwali=?, tahunmasuk=?, id_pembayaran=? WHERE nim='$oldnim'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim, $nama, $prodi, $jeniskelamin, $alamat, $dosenwali, $tahunmasuk, $pembayaran]);
    }

    
}
