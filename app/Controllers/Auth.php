<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index(){
        $data = [
            "judul" => "Login | Portal Owner "
        ];
        // cek apakah admin sudah punya sesi login
        if(session()->has("authOwner")){
            header("Location: " . base_url() . "");
            exit;
        } 
        if(session()->has("authKasir")){
            header("Location: " . base_url() . "");
            exit;
        }  
        if($_POST){
            if(!$this->validate([
                "username" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan username terlebih dahulu"
                    ]
                ],
                "password" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan password terlebih dahulu"
                    ]
                ]
            ])){
                $validation = \Config\Services::validation();
                session()->setFlashdata("username", $validation->getError("username"));
                session()->setFlashdata("password", $validation->getError("password"));
                return redirect()->to("login")->withInput();
            }

            $this->userModel = new UserModel();
            $dataUser = $this->userModel->getDataByUsername($_POST["username"]);
            // lakukan autentifikasi
            if(!empty($dataUser)){
                // cek password yang dikirim
                if($dataUser[0]["password"] == $_POST["password"]){
                    // set sesi login
                    if($dataUser[0]["is_admin"] == 0 && $dataUser[0]["is_active"] == 1){
                        $_SESSION = [
                            "authKasir" => true,
                            "usernamekasir" => $dataUser[0]["username"]
                        ];
                    } elseif($dataUser[0]["is_admin"] == 1){
                        $_SESSION = [
                            "authOwner" => true
                        ];
                    }
                    header("Location: " . base_url() . "");
                    exit;
                } else {
                    // password salah
                    session()->setFlashdata("failedPassword", "Maaf, password anda salah");
                    return redirect()->to("login")->withInput();
                }
            } else {
                // username salah
                session()->setFlashdata("failedUsername", "Maaf, username anda salah");
                return redirect()->to("login")->withInput();
            }
        }
        return view('Auth/index', $data);
    }
  
}