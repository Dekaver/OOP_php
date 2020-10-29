<?php

class programstudi extends Dbh{

    public function getId(){
        $sql = "SELECT id FROM program_studi";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result['id'];
    }

    public function getProgramstudi(){
        $sql = "SELECT * FROM program_studi";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getNama($id){
        $sql = "SELECT nama_prodi FROM program_studi WHERE id=?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
        $result = $st->fetch();
        return $result['nama_prodi'];
    }

    public function getjurusan($id){
        $sql = "SELECT jurusan FROM program_studi";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
        $result = $st->fetch();
        return $result['jurusan'];
    }
    

    // public function setMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran){
    //     $sql = "INSERT INTO mahasiswa(nim, nama_mhs, id_prodi, alamat_mhs, dosenwali, tahunmasuk, jenis_kelamin, id_pembayaran) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    //     $st = $this->connect()->prepare($sql);
    //     $st->execute([$nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran]);
    // }

    // public function removeMahasiswa($nim){
    //     $sql = "DELETE FROM mahasiswa WHERE nim = ?";
    //     $st = $this->connect()->prepare($sql);
    //     $st->execute([$nim]);

    // }

    // public function changeMahasiswa($nim, $nama, $prodi, $alamat, $dosenwali, $tahunmasuk, $jeniskelamin, $pembayaran, $oldnim){
    //     $sql = "UPDATE mahasiswa SET nim = ?, nama_mhs = ?, id_prodi = ?, jenis_kelamin = ?, alamat_mhs=?, dosenwali=?, tahunmasuk=?, id_pembayaran=? WHERE nim='$oldnim'";
    //     $st = $this->connect()->prepare($sql);
    //     $st->execute([$nim, $nama, $prodi, $jeniskelamin, $alamat, $dosenwali, $tahunmasuk, $pembayaran]);
    // }

    
}
