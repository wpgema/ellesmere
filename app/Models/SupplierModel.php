<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model{
    protected $table = "suppliers";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "telp", "email", "address"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua suppliers 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua suppliers 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data suppliers berdasarkan name
    // digunakan
    // ctl suppliers class auth
    public function getDataByName($name){
        return $this->query("SELECT * FROM " . $this->table . " WHERE name = '$name'")->getResultArray();
    }

    // method untuk menambah data suppliers
    public function saveData($data){
        $this->save([
            "name" => htmlspecialchars($data["name"]),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
            "email" => strtolower(htmlspecialchars($data["email"])),
            "address" => htmlspecialchars($data["address"])
        ]);
    }

    // method untuk mengubah data suppliers
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "name" => htmlspecialchars($data["name"]),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
            "email" => strtolower(htmlspecialchars($data["email"])),
            "address" => htmlspecialchars($data["address"])
        ]);
    }

    // method untuk menghapus data suppliers
    public function deleteData($id){
        $this->delete($id);
    }

    // mengambil data suppliers selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

}