<?php

namespace App\Models;

use CodeIgniter\Model;

class QrisModel extends Model{
    protected $table = "qris";
    protected $primaryKey = "id";
    protected $allowedFields = ["qris"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua qris
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua qris
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk menambah data qris
    public function saveData($data){
        $this->save([
            "qris" => strtolower(htmlspecialchars($data["image"]))
        ]);
    }

    // method untuk mengubah data qris
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "qris" => strtolower(htmlspecialchars($data["image"]))
        ]);
    }

    // method untuk menghapus data qris
    public function deleteData($id){
        $this->delete($id);
    }

}