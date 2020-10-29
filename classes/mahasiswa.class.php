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

    public function getNama($nim){
        $sql = "SELECT nama_mhs FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['nama_mhs'];
    }

    public function getAlamat($nim){
        $sql = "SELECT alamat_mhs FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['alamat_mhs'];
    }

    public function getIdProdi($nim){
        $sql = "SELECT id_prodi FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['id_prodi'];
    }
    
    public function getIdDosenwali($nim){
        $sql = "SELECT dosenwali FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['dosenwali'];
    }
    public function getJeniskelamin($nim){
        $sql = "SELECT jenis_kelamin FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['jenis_kelamin'];
    }
    public function getIdPembayaran($nim){
        $sql = "SELECT id_pembayaran FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['id_pembayaran'];
    } 
    public function getTahunmasuk($nim){
        $sql = "SELECT tahunmasuk FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
        $result = $st->fetch();
        return $result['tahunmasuk'];
    }

    public function addMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin ){
        $sql = "INSERT INTO mahasiswa(nim, nama_mhs, id_prodi, alamat_mhs, dosenwali, tahunmasuk, jenis_kelamin) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin ]);
    }

    public function removeMahasiswa($nim){
        $sql = "DELETE FROM mahasiswa WHERE nim = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim]);
    }

    public function updateMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin , $oldnim){
        $sql = "UPDATE mahasiswa SET nim = ?, nama_mhs = ?, id_prodi = ?, jenis_kelamin = ?, alamat_mhs=?, dosenwali=?, tahunmasuk=? WHERE nim='$oldnim'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$nim, $nama, $prodi, $jeniskelamin, $alamat, $dosenwali, $tahunmasuk]);
    }

    
}
