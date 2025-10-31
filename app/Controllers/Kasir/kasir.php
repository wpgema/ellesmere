<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;
use App\Models\SaleModel;
use App\Models\DetailSaleModel;
use App\Models\ProductModel;
use App\Models\EmployesModel;

class Kasir extends BaseController
{
    private $penjualanModel;
    private $detailPenjualanModel;
    private $productModel;
    private $employesModel;

    public function  __construct()
    {
        $this->authKasir();
        $this->penjualanModel = new SaleModel();
        $this->detailPenjualanModel = new DetailSaleModel();
        $this->productModel = new ProductModel();
        $this->employesModel = new EmployesModel();
    }

    public function index()
    {
        $param["kode_penjualan"] = isset($_SESSION["kode_penjualan"]) ? $_SESSION["kode_penjualan"] : 0;
        $data = [
            "products" => $this->productModel->getAllData(),
            "carts1" => $this->penjualanModel->getDataByKodePenjualan($param["kode_penjualan"]),
            "carts" => $this->detailPenjualanModel->getDataByKodePenjualan($param["kode_penjualan"]),
            "employes" => $this->employesModel->getAllData()
        ];
        if($_POST){
            if($_POST["tipe"] == "cart"){
                $_POST["kode_penjualan"] = isset($_SESSION["kode_penjualan"]) ?  $_SESSION["kode_penjualan"] : mt_rand(0000, 9999);
                $_SESSION["kode_penjualan"] = $_POST["kode_penjualan"];
                if($_POST["kode_product"] == "jasa_servis"){
                    $_POST["sub_total"] = intval($_POST["product_price"]);
                } else {
                    $_POST["sub_total"] = $_POST["product_price"] * $_POST["qty"];
                }
                $param["data_penjualan"] = $this->penjualanModel->getDataByKodePenjualan($_POST["kode_penjualan"]);
                if(empty($param["data_penjualan"])){
                    $_POST["transaksi_date"] = date("Y-m-d");
                    $this->penjualanModel->saveData($_POST);
                }
                if($_POST["kode_product"] != "jasa_servis"){
                    $product = $this->productModel->getDataByKodeProduct($_POST["kode_product"]);
                    $param["kode_product"] = $_POST["kode_product"];
                    $param["qty"] = $product[0]["qty"] - $_POST["qty"];
                    if($param["qty"] < 0){
                        session()->set("stok_habis", "Maaf sisa Stok Barang tinggal " . $product[0]["qty"]);
                        return redirect()->to("kasir");
                    }
                    $this->productModel->updateDataStok($param);
                }
                $this->detailPenjualanModel->saveData($_POST);
                return redirect()->to("kasir");
            } elseif($_POST["tipe"] == "konfirmasi"){
                $_POST["total_price"] = intval($_POST["total_product"]) + intval($_POST["total_service"]);
                $this->penjualanModel->updateData($_POST); 
                unset($_SESSION["kode_penjualan"]);
                return redirect()->to("kasir");
            } elseif($_POST["tipe"] == "cari"){
                $data["products"] = $this->productModel->like('name', $_POST["cari"])->get()->getResultArray();
            }
        }
        return view('Kasir/Kasir/index', $data);
    }

    public function hapusData($id){
        $productBuy = $this->detailPenjualanModel->getData($id);
        $productReady = $this->productModel->getDataByKodeProduct($productBuy["kode_product"]);
        $params["kode_product"] = $productBuy["kode_product"];
        $params["qty"] = $productReady[0]["qty"] + $productBuy["qty"];
        $this->productModel->updateDataStok($params);
        $this->detailPenjualanModel->deleteData($id);
        return redirect()->to("kasir");
    }

}
