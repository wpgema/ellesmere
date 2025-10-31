<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = "users";
    protected $primaryKey = "id";
    protected $allowedFields = ["username", "password", "is_active", "is_admin"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua user 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua user 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data user berdasarkan username
    // digunakan
    // ctl user class auth
    public function getDataByUsername($username){
        return $this->query("SELECT * FROM " . $this->table . " WHERE username = '$username'")->getResultArray();
    }

    // method untuk menambah data user
    public function saveData($data){
        $this->save([
            "username" => strtolower(htmlspecialchars($data["username"])),
            "password" => strtolower(htmlspecialchars($data["password"])),
            "is_active" => strtolower(htmlspecialchars($data["is_active"])),
            "is_admin" => strtolower(htmlspecialchars($data["is_admin"]))
        ]);
    }

    // method untuk mengubah data user
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "username" => strtolower(htmlspecialchars($data["username"])),
            "password" => strtolower(htmlspecialchars($data["password"])),
            "is_active" => strtolower(htmlspecialchars($data["is_active"])),
            "is_admin" => strtolower(htmlspecialchars($data["is_admin"]))
        ]);
    }

    // method untuk menghapus data user
    public function deleteData($id){
        $this->delete($id);
    }

    // mengambil data user selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

}