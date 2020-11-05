<?php

class pembayaran extends Dbh{

    public function getPembayaran(){
        $sql = "SELECT * FROM pembayaran";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }

    public function getIdPembayaran(){
        $sql = "SELECT id_pembayaran FROM pembayaran";
        $st = $this->connect()->query($sql);
        $result = $st->fetch();
        return $result;
    }

    public function getTanggal($id_pembayaran){
        $sql = "SELECT tanggal FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['tanggal'];
    }

    public function getBank($id_pembayaran){
        $sql = "SELECT bank FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['bank'];
    }

    public function getNominal($id_pembayaran){
        $sql = "SELECT nominal FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['nominal'];
    }

    public function getNamaimg($id_pembayaran){
        $sql = "SELECT nama_img FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['nama_img'];
    }

    public function getTextimg($id_pembayaran){
        $sql = "SELECT text_img FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['text_img'];
    }

    public function getNim($id_pembayaran){
        $sql = "SELECT nim FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
        $result = $st->fetch();
        return $result['nim'];
    }
    
    public function addPembayaran($id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim){
        $sql = "INSERT INTO pembayaran(id_pembayaran, tanggal, bank, nominal, nama_img, text_img, nim) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim]);
    }

    public function removePembayaran($id_pembayaran){
        $sql = "DELETE FROM pembayaran WHERE id_pembayaran = ?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran]);
    }

    public function updatePembayaran($id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim, $oldid_pembayaran){
        $sql = "UPDATE pembayaran SET id_pembayaran = ?, tanggal=?, bank=?, nominal=?, nama_img=?, text_img=?, nim=? WHERE id_pembayaran=?";
        $st = $this->connect()->prepare($sql);
        $st->execute([$id_pembayaran, $tanggal, $bank, $nominal, $namaimg, $textimg, $nim, $oldid_pembayaran]);
    }

    
}
