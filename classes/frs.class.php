<?php

class frs extends Dbh{

    public function getfrs(){
        $sql = "SELECT * FROM frs";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getIdFrs(){
        $sql = "SELECT id FROM frs";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }
    public function getIdPengajar($id){
        $sql = "SELECT id_pengajar FROM frs WHERE id = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
        $result = $st->fetch();
        return $result['id_pengajar'];
    }

    public function getNim($id){
        $sql = "SELECT nim FROM frs WHERE id = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
        $result = $st->fetch();
        return $result['nim'];
    }

    public function getKeterangan($id){
        $sql = "SELECT keterangan FROM frs WHERE id = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
        $result = $st->fetch();
        return $result['keterangan'];
    }
    
    public function addPembayaran($id, $nim, $id_pengajar, $keterangan){
        $sql = "INSERT INTO frs(id, nim, id_pengajar, keterangan) VALUES (?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id, $nim, $id_pengajar, $keterangan]);
    }

    public function removeFrs($id){
        $sql = "DELETE FROM frs WHERE id = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id]);
    }

    public function updateMatakuliah($id, $nim, $id_pengajar, $keterangan, $oldid){
        $sql = "UPDATE frs SET id = ?, nim=?, id_pengajar=?, keterangan=? WHERE id=?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id, $nim, $id_pengajar, $keterangan, $oldid]);
    }

    
}
