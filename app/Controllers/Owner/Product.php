<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\SupplierModel;

class Product extends BaseController
{
    private $productModel;
    private $supplierModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->productModel = new ProductModel();
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        if($_POST){
            $_POST["kode_product"] = mt_rand(0000, 9999);
            $_POST["price_service"] = 0;
            // lakukan validasi input
            if(!$this->validate([
                "name" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan nama produk terlebih dahulu"
                    ]
                ],
                "categori" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan kategori produk terlebih dahulu"
                    ]
                ],
                "price_buy" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan harga beli terlebih dahulu"
                    ]
                ],
                "price_sale" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan harga jual terlebih dahulu"
                    ]
                ],
                "supplier" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan supplier terlebih dahulu"
                    ]
                ]
            ])){
                // input invalid
                $validation = \Config\Services::validation();
                session()->setFlashdata("name", $validation->getError("name"));
                session()->setFlashdata("categori", $validation->getError("categori"));
                session()->setFlashdata("price_buy", $validation->getError("price_buy"));
                session()->setFlashdata("price_sale", $validation->getError("price_sale"));
                session()->setFlashdata("supplier", $validation->getError("supplier"));
                session()->set("danger", "Gagal Ditambahkan");
                session()->set("dangertitle", "Data Produk");
                return redirect()->to("produk")->withInput();
            }
            // input valid
            // lakukan pengecekan gambar
            if($this->request->getFile('image')->getError() == 4){
                // video1 tidak dikirim
                $_POST["image"] = "";
            } else {
                // video1 dikirim
                $image = $this->request->getFile('image'); 
                $imageName = $image->getName();
                $image->move(FCPATH . 'img/produk/', $imageName);
                $_POST["image"] = $imageName;
            }
            $this->productModel->saveData($_POST);
            session()->set("success", "Berhasil Ditambahkan");
            session()->set("successtitle", "Data Produk");
            return redirect()->to(base_url('produk'));
        }
        $data = [
            "products" => $this->productModel->getAllDataInnerJoinSupplier(),
            "suppliers" => $this->supplierModel->getAllData()
        ];
        return view('Owner/Produk/index', $data);
    }

    public function ubahData($id){
        $data = [
            "product" => $this->productModel->find($id),
            "suppliers" => $this->supplierModel->getAllData()
        ];
        return view('Owner/Produk/ubah', $data);
    }

    public function prosesUbahData(){
        if(!$this->validate([
            "name" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan nama produk terlebih dahulu"
                ]
            ],
            "categori" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan kategori produk terlebih dahulu"
                ]
            ],
            "price_buy" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan harga beli terlebih dahulu"
                ]
            ],
            "price_sale" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan harga jual terlebih dahulu"
                ]
            ],
            "supplier" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan supplier terlebih dahulu"
                ]
            ]
        ])){
            // input invalid
            $validation = \Config\Services::validation();
            session()->setFlashdata("name", $validation->getError("name"));
            session()->setFlashdata("categori", $validation->getError("categori"));
            session()->setFlashdata("price_buy", $validation->getError("price_buy"));
            session()->setFlashdata("price_sale", $validation->getError("price_sale"));
            session()->setFlashdata("supplier", $validation->getError("supplier"));
            session()->set("danger", "Gagal Ditambahkan");
            session()->set("dangertitle", "Data Produk");
            return redirect()->to("produk")->withInput();
        }
        // input valid
        if($this->request->getFile('image')->getError() == 4){
            // image tidak dikirim
            $_POST["image"] = $_POST["imageOld"];
        } else {
            // pdf dikirim
            $path = "img/produk/" . $_POST["imageOld"];
            if (!empty($_POST["imageOld"]) && file_exists($path)) {
                unlink($path);
            }
            $image = $this->request->getFile('image'); 
            $imageName = $image->getName();
            $image->move(FCPATH . 'img/produk/', $imageName);
            $_POST["image"] = $imageName;
        }
        $this->productModel->updateData($_POST);
        session()->set("success", "Berhasil Ditambahkan");
        session()->set("successtitle", "Data Produk");
        return redirect()->to(base_url('produk'));
    }

    public function hapusData($id){
        $data = [
            "product" => $this->productModel->find($id)
        ];
        $path = "img/produk/" . $data["product"]["image"];
        if (!empty($data["product"]["image"]) && file_exists($path)) {
            unlink($path);
        }
        $this->productModel->deleteData($id);
        session()->set("success", "Berhasil Dihapus");
        session()->set("successtitle", "Data Produk");
        return redirect()->to(base_url('produk'));
    }
}
