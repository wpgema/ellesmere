<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\ProductModel;

class Expenditure extends BaseController
{
    private $productModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $perPage = 10;
        $page = (int) ($this->request->getVar('page') ?? 1);

        $expenditures = $this->productModel->orderBy('id', 'DESC')->paginate($perPage);
        $pager = $this->productModel->pager;

        $start = ($page > 0) ? (($page - 1) * $perPage) + 1 : 1;

        $data = [
            "expenditures" => $expenditures,
            "pager" => $pager,
            "start" => $start
        ];

        return view('Owner/Pengeluaran/index', $data);
    }

}
