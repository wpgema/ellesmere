<?php

namespace App\Controllers\Struk;
use App\Controllers\BaseController;
use App\Models\SaleModel;

class Struk extends BaseController
{
    private $customerModel;

    public function  __construct()
    {
        $this->customerModel = new SaleModel();
    }

    public function index($kode_penjualan){
        $data["sales"] = $this->customerModel->getDataPenjualanInnerJoinSaleDetailForBookingOffline($kode_penjualan);
        return view('Struk/index', $data);
    }

}
