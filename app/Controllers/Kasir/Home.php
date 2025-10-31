<?php

namespace App\Controllers\Kasir;
use App\Controllers\BaseController;

class Home extends BaseController
{

    public function  __construct()
    {
        $this->authKasir();
    }

    public function index(): string
    {
        return view('Kasir/Home/index');
    }
}
