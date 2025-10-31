<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\EmployesModel;

class Karyawan extends BaseController
{
    private $employesModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->employesModel = new EmployesModel();
    }

    public function index()
    {
        if($_POST){
            // var_dump($_POST); exit;
            // lakukan validasi input
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
                ],
                "position" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan posisi terlebih dahulu"
                    ]
                ],
                "is_active" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan status terlebih dahulu"
                    ]
                ]
            ])){
                // input invalid
                $validation = \Config\Services::validation();
                session()->setFlashdata("name", $validation->getError("name"));
                session()->setFlashdata("telp", $validation->getError("telp"));
                session()->setFlashdata("address", $validation->getError("address"));
                session()->setFlashdata("position", $validation->getError("position"));
                session()->setFlashdata("is_active", $validation->getError("is_active"));
                session()->setFlashdata("image", $validation->getError("image"));
                session()->set("danger", "Gagal Ditambahkan");
                session()->set("dangertitle", "Data Karyawan");
                return redirect()->to("karyawan")->withInput();
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
                $image->move(FCPATH . 'img/karyawan/', $imageName);
                $_POST["image"] = $imageName;
            }
            $this->employesModel->saveData($_POST);
            session()->set("success", "Berhasil Ditambahkan");
            session()->set("successtitle", "Data Karyawan");
            return redirect()->to(base_url('karyawan'));
        }
        $data = [
            "employes" => $this->employesModel->getAllData()
        ];
        return view('Owner/Karyawan/index', $data);
    }

    public function ubahData($id){
        $data = [
            "employe" => $this->employesModel->find($id)
        ];
        return view('Owner/Karyawan/ubah', $data);
    }

    public function prosesUbahData(){
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
            ],
            "position" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan posisi terlebih dahulu"
                ]
            ],
            "is_active" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan status terlebih dahulu"
                ]
            ]
        ])){
            // input invalid
            $validation = \Config\Services::validation();
            session()->setFlashdata("name", $validation->getError("name"));
            session()->setFlashdata("telp", $validation->getError("telp"));
            session()->setFlashdata("address", $validation->getError("address"));
            session()->setFlashdata("position", $validation->getError("position"));
            session()->setFlashdata("is_active", $validation->getError("is_active"));
            session()->setFlashdata("image", $validation->getError("image"));
            session()->set("danger", "Gagal Ditambahkan");
            session()->set("dangertitle", "Data Karyawan");
            return redirect()->to("karyawan")->withInput();
        }
        // input valid
        if($this->request->getFile('image')->getError() == 4){
            // image tidak dikirim
            $_POST["image"] = $_POST["imageOld"];
        } else {
            // pdf dikirim
            $path = "img/karyawan/" . $_POST["imageOld"];
            if (!empty($_POST["imageOld"]) && file_exists($path)) {
                unlink($path);
            }
            $image = $this->request->getFile('image'); 
            $imageName = $image->getName();
            $image->move(FCPATH . 'img/karyawan/', $imageName);
            $_POST["image"] = $imageName;
        }
        $this->employesModel->updateData($_POST);
        session()->set("success", "Berhasil Ditambahkan");
        session()->set("successtitle", "Data Karyawan");
        return redirect()->to(base_url('karyawan'));
    }

    public function hapusData($id){
        $data = [
            "karyawan" => $this->employesModel->find($id)
        ];
        $path = "img/karyawan/" . $data["karyawan"]["image"];
        if (!empty($data["karyawan"]["image"]) && file_exists($path)) {
            unlink($path);
        }
        $this->employesModel->deleteData($id);
        session()->set("success", "Berhasil Dihapus");
        session()->set("successtitle", "Data karyawan");
        return redirect()->to(base_url('karyawan'));
    }
}
