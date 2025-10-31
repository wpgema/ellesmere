<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\SupplierModel;
use App\Models\ProductModel;

class Supplier extends BaseController
{
    private $supplierModel;
    private $productModel;
    private $detailPembelianModel;
    private $pembelianModel;
    private $paidModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->supplierModel = new SupplierModel();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        if($_POST){
            // lakukan validasi input
            $data["supplier"] = $this->supplierModel->getDataByName($_POST["name"]);
            foreach($data["supplier"] as $supplier){
                if($supplier["name"] == strtolower($_POST["name"])){
                    session()->set("nameerror", "Supplier telah terdaftar");
                    return redirect()->to(base_url('supplier'));
                }
            }
            if(!$this->validate([
                "name" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan nama terlebih dahulu"
                    ]
                ],
                "telp" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan nomor kontak terlebih dahulu"
                    ]
                ],
                "address" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan alamat terlebih dahulu"
                    ]
                ]
            ])){
                // input invalid
                $validation = \Config\Services::validation();
                session()->setFlashdata("name", $validation->getError("name"));
                session()->setFlashdata("telp", $validation->getError("telp"));
                session()->setFlashdata("address", $validation->getError("address"));
                session()->set("danger", "Gagal Ditambahkan");
                session()->set("dangertitle", "Data Supplier");
                return redirect()->to("supplier")->withInput();
            }
            // input valid
            $this->supplierModel->saveData($_POST);
            session()->set("success", "Berhasil Ditambahkan");
            session()->set("successtitle", "Data Supplier");
            return redirect()->to(base_url('supplier'));
        }
        $data = [
            "suppliers" => $this->supplierModel->getAllData()
        ];
        return view('Owner/Supplier/index', $data);
    }

    public function hapusDataPesananBarang($id, $id_supplier){
        $this->detailPembelianModel->deleteData($id);
        return redirect()->to("supplier/" . $id_supplier);
    }

    public function ubahData($id){
        $data = [
            "supplier" => $this->supplierModel->find($id)
        ];
        return view('Owner/Supplier/ubah', $data);
    }

    public function prosesUbahData(){
        $data["supplier"] = $this->supplierModel->getAllDataNotThisId($_POST["id"]);
        foreach($data["supplier"] as $supplier){
            if($supplier["name"] == strtolower($_POST["name"])){
                session()->set("nameerror", "Supplier telah terdaftar");
                return redirect()->to(base_url('supplier'));
            }
        }
        if(!$this->validate([
            "name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan nama terlebih dahulu"
                ]
            ],
            "telp" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan nomor kontak terlebih dahulu"
                ]
            ],
            "address" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan alamat terlebih dahulu"
                ]
            ]
        ])){
            // input invalid
            $validation = \Config\Services::validation();
            session()->setFlashdata("name", $validation->getError("name"));
            session()->setFlashdata("telp", $validation->getError("telp"));
            session()->setFlashdata("address", $validation->getError("address"));
            session()->set("danger", "Gagal Ditambahkan");
            session()->set("dangertitle", "Data Supplier");
            return redirect()->to("supplier")->withInput();
        }
        $this->supplierModel->updateData($_POST);
        session()->set("success", "Berhasil Ditambahkan");
        session()->set("successtitle", "Data Supplier");
        return redirect()->to(base_url('supplier'));
    }

    public function hapusData($id){
        $this->supplierModel->deleteData($id);
        session()->set("success", "Berhasil Dihapus");
        session()->set("successtitle", "Data Supplier");
        return redirect()->to(base_url('supplier'));
    }
}
