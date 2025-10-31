<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\ExpendituresModel;

class Expenditures extends BaseController
{
    private $expendituresModel;

    public function __construct()
    {
        $this->authOwner();
        $this->expendituresModel = new ExpendituresModel();
    }

    public function index()
    {
        if($_POST){
            if(!$this->validate([
                "type" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan jenis pengeluaran terlebih dahulu"
                    ]
                ],
                "date" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan tanggal terlebih dahulu"
                    ]
                ],
                "amount" => [
                    "rules" => "required",
                    "errors" => [
                        "required" => "Maaf, masukan jumlah terlebih dahulu"
                    ]
                ]
            ])){
                $validation = \Config\Services::validation();
                session()->setFlashdata("type", $validation->getError("type"));
                session()->setFlashdata("date", $validation->getError("date"));
                session()->setFlashdata("amount", $validation->getError("amount"));
                session()->set("danger", "Gagal Ditambahkan");
                session()->set("dangertitle", "Data Pengeluaran");
                return redirect()->to("pengeluaran")->withInput();
            }
            $this->expendituresModel->saveData($_POST);
            session()->set("success", "Berhasil Ditambahkan");
            session()->set("successtitle", "Data Pengeluaran");
            return redirect()->to(base_url('pengeluaran'));
        }

        $perPage = 10;
        $page = (int) ($this->request->getVar('page') ?? 1);

        $expenditures = $this->expendituresModel->orderBy('id', 'DESC')->paginate($perPage);
        $pager = $this->expendituresModel->pager;
        $start = ($page > 0) ? (($page - 1) * $perPage) + 1 : 1;

        return view('Owner/Expenditures/index', [
            'expenditures' => $expenditures,
            'pager' => $pager,
            'start' => $start
        ]);
    }

    public function edit($id){
        $data = [
            "expenditure" => $this->expendituresModel->find($id)
        ];
        return view('Owner/Expenditures/edit', $data);
    }

    public function update($id){
        if(!$this->validate([
            "type" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan jenis pengeluaran terlebih dahulu"
                ]
            ],
            "date" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan tanggal terlebih dahulu"
                ]
            ],
            "amount" => [
                "rules" => "required",
                "errors" => [
                    "required" => "Maaf, masukan jumlah terlebih dahulu"
                ]
            ]
        ])){
            session()->setFlashdata("type", $this->validator->getError("type"));
            session()->setFlashdata("date", $this->validator->getError("date"));
            session()->setFlashdata("amount", $this->validator->getError("amount"));
            session()->set("danger", "Gagal Diubah");
            session()->set("dangertitle", "Data Pengeluaran");
            return redirect()->to("pengeluaran/edit/".$id)->withInput();
        }

        $this->expendituresModel->updateData($_POST);
        session()->set("success", "Berhasil Diubah");
        session()->set("successtitle", "Data Pengeluaran");
        return redirect()->to(base_url('pengeluaran'));
    }

    public function delete($id){
        $this->expendituresModel->deleteData($id);
        session()->set("success", "Berhasil Dihapus");
        session()->set("successtitle", "Data Pengeluaran");
        return redirect()->to(base_url('pengeluaran'));
    }
}
