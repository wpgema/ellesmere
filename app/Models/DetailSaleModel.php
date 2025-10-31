<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailSaleModel extends Model{
    protected $table = "sale_detail";
    protected $primaryKey = "id";
    protected $allowedFields = ["kode_penjualan", "kode_product", "product", "product_price", "qty", "sub_total"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua penjualan 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua penjualan 
    public function getAllData(){
        return $this->findAll();
    }

    // method untuk mengambil data penjualan berdasarkan name
    // digunakan
    // ctl penjualan class auth
    public function getDataByKodePenjualan($kode_penjualan){
        return $this->query("SELECT * FROM " . $this->table . " WHERE kode_penjualan = '$kode_penjualan'")->getResultArray();
    }

    // method untuk menambah data penjualan
    public function saveData($data){
        $this->save([
            "kode_penjualan" => strtolower(htmlspecialchars($data["kode_penjualan"])),
            "kode_product" => strtolower(htmlspecialchars($data["kode_product"])),
            "product" => strtolower(htmlspecialchars($data["product"])),
            "product_price" => strtolower(htmlspecialchars($data["product_price"])),
            "qty" => strtolower(htmlspecialchars($data["qty"])),
            "sub_total" => strtolower(htmlspecialchars($data["sub_total"]))
        ]);
    }

    // method untuk mengubah data penjualan
    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"])
        ]);
    }

    // method untuk menghapus data penjualan
    public function deleteData($id){
        $this->delete($id);
    }

    public function deleteDataByKodePenjualanOrBooking($kode_penjualan){
        $this->query(
            "DELETE FROM " . $this->table . " WHERE kode_penjualan = '$kode_penjualan'"
        );
    }

    // mengambil data penjualan selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

}