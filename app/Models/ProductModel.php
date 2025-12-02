<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model{
    protected $table = "products";
    protected $primaryKey = "id";
    protected $allowedFields = ["kode_product", "name", "categori", "qty", "price_buy", "price_sale", "image", "supplier"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua product 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua product 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data product berdasarkan name
    // digunakan
    // ctl product class auth
    public function getDataByKodeProduct($kode_product){
        return $this->query("SELECT * FROM " . $this->table . " WHERE kode_product = '$kode_product'")->getResultArray();
    }

    // method untuk menambah data products
    public function saveData($data){
        $this->save([
            "kode_product" => strtolower(htmlspecialchars($data["kode_product"])),
            "name" => htmlspecialchars($data["name"]),
            "categori" => htmlspecialchars($data["categori"]),
            "qty" => strtolower(htmlspecialchars($data["qty"])),
            "price_buy" => strtolower(htmlspecialchars($data["price_buy"])),
            "price_sale" => strtolower(htmlspecialchars($data["price_sale"])),
            "image" => strtolower(htmlspecialchars($data["image"])),
            "supplier" => strtolower(htmlspecialchars($data["supplier"]))
        ]);
    }

    // method untuk mengubah data products
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "kode_product" => strtolower(htmlspecialchars($data["kode_product"])),
            "name" => htmlspecialchars($data["name"]),
            "categori" => htmlspecialchars($data["categori"]),
            "qty" => strtolower(htmlspecialchars($data["qty"])),
            "price_buy" => strtolower(htmlspecialchars($data["price_buy"])),
            "price_sale" => strtolower(htmlspecialchars($data["price_sale"])),
            "image" => strtolower(htmlspecialchars($data["image"])),
            "supplier" => strtolower(htmlspecialchars($data["supplier"]))
        ]);
    }

    // method untuk mengubah data stok products
    public function updateDataStok($data){
        $qty = $data["qty"];
        $kode_product = $data["kode_product"];
        
        $this->query(
            "UPDATE " . $this->table . "
                SET qty = '$qty'
                WHERE kode_product = '$kode_product'"
        );
    }

    // method untuk menghapus data products
    public function deleteData($id){
        $this->delete($id);
    }

    // mengambil data products selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    } 

    public function getDataBySupplier($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE supplier = $id")->getResultArray();
    }

    public function getAllDataInnerJoinSupplier(){
        return $this->query("SELECT " . $this->table . ".id, suppliers.name AS supplier, " . $this->table . ".name, kode_product, qty, price_buy, price_sale, image, categori FROM " . $this->table . " INNER JOIN suppliers ON " . $this->table . ".supplier = suppliers.id")->getResultArray();
    }

    public function getAllDataExist(){
        return $this->query("SELECT * FROM " . $this->table . " WHERE qty > 0")->getResultArray();
    }

}