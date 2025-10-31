<?php

namespace App\Controllers\Owner;
use App\Controllers\BaseController;
use App\Models\QrisModel;

class Qris extends BaseController
{
    private $qrisModel;

    public function  __construct()
    {
        $this->authOwner();
        $this->qrisModel = new QrisModel();
    }

    public function index()
    {
        $data = [
            "qries" => $this->qrisModel->getAllData()
        ];
        if($_POST){
            // lakukan pengecekan gambar
            if($this->request->getFile('image')->getError() == 4){
                // video1 tidak dikirim
                $_POST["image"] = "";
            } else {
                // video1 dikirim
                $image = $this->request->getFile('image'); 
                $imageName = $image->getName();
                $image->move(FCPATH . 'img/qris/', $imageName);
                $_POST["image"] = $imageName;
            }
            $this->qrisModel->saveData($_POST);
            session()->set("success", "Berhasil Ditambahkan");
            session()->set("successtitle", "Qris Pembayaran");
            return redirect()->to(base_url('qris'));
        }
        return view('Owner/Qris/index', $data);
    }

    public function hapusData($id){
        $data = [
            "qris" => $this->qrisModel->find($id)
        ];
        $path = "img/qris/" . $data["qris"]["qris"];
        if (!empty($data["qris"]["qris"]) && file_exists($path)) {
            unlink($path);
        }
        $this->qrisModel->deleteData($id);
        session()->set("success", "Berhasil Dihapus");
        session()->set("successtitle", "Qris Pembayaran");
        return redirect()->to(base_url('qris'));
    }
}
