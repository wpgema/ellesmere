<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function index()
    {
        session_unset();
        session_destroy();
        return redirect()->to(base_url("login"));
    }

    public function customer()
    {
        session_unset();
        session_destroy();
        return redirect()->to(base_url("login-booking-online"));
    }
}
