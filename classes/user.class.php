<?php

class user extends Dbh{
    public function getUser(){
        $sql = "SELECT * FROM user";
        $st = $this->connect()->query($sql);
        $result = $st->fetchAll();
        return $result;
    }
    public function addUser($user, $passwd, $hak_akses){
        $sql = "INSERT INTO user(username, password, hak_akses) VALUES (?, ?, ?)";
        $st = $this->connect()->prepare($sql);
        $st->execute([$user, $passwd, $hak_akses]);
    }

    public function updateUser($id, $user, $passwd, $hak_akses){
        $sql = "UPDATE user SET username=?, password=?, hak_akses=? WHERE id='$id'";
        $st = $this->connect()->prepare($sql);
        $st->execute([$user, $passwd, $hak_akses]);
    }

}