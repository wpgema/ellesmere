<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployesModel extends Model{
    protected $table = "employes";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "telp", "address", "position", "is_active", "image"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua employes 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua employes 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data employes berdasarkan name
    // digunakan
    // ctl employes class auth
    public function getDataByName($name){
        return $this->query("SELECT * FROM " . $this->table . " WHERE name = '$name'")->getResultArray();
    }

    // method untuk menambah data employes
    public function saveData($data){
        $this->save([
            "name" => strtolower(htmlspecialchars($data["name"])),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
            "address" => strtolower(htmlspecialchars($data["address"])),
            "position" => strtolower(htmlspecialchars($data["position"])),
            "is_active" => strtolower(htmlspecialchars($data["is_active"])),
            "image" => strtolower(htmlspecialchars($data["image"]))
        ]);
    }

    // method untuk mengubah data employes
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "name" => strtolower(htmlspecialchars($data["name"])),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
            "address" => strtolower(htmlspecialchars($data["address"])),
            "position" => strtolower(htmlspecialchars($data["position"])),
            "is_active" => strtolower(htmlspecialchars($data["is_active"])),
            "image" => strtolower(htmlspecialchars($data["image"]))
        ]);
    }

    // method untuk menghapus data employes
    public function deleteData($id){
        $this->delete($id);
    }

    // mengambil data employes selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

}