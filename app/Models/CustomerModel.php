<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model{
    protected $table = "customers";
    protected $primaryKey = "id";
    protected $allowedFields = ["kode_customer", "name", "telp", "address"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua customers 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua customers 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data customers berdasarkan name
    // digunakan
    // ctl customers class auth
    public function getDataByNoTelp($telp){
        return $this->query("SELECT * FROM " . $this->table . " WHERE telp = '$telp'")->getResultArray();
    }

    // method untuk menambah data customers
    public function saveData($data){
        $this->save([
            "kode_customer" => strtolower(htmlspecialchars($data["kode_customer"])),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
        ]);
    }

    // method untuk mengubah data customers
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "kode_customer" => strtolower(htmlspecialchars($data["kode_customer"])),
            "name" => htmlspecialchars($data["name"]),
            "telp" => strtolower(htmlspecialchars($data["telp"])),
            "address" => htmlspecialchars($data["address"])
        ]);
    }

    // method untuk menghapus data customers
    public function deleteData($id){
        $this->delete($id);
    }

    // mengambil data customers selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

}