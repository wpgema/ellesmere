<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;

class Home extends BaseController
{

    public function  __construct()
    {
        $this->authOwner();
    }

    public function index(): string
    {
        return view('Owner/Home/index');
    }
}
