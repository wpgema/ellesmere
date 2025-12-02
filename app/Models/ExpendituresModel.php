<?php

namespace App\Models;

use CodeIgniter\Model;


class ExpendituresModel extends Model{
    protected $table = "expenditures";
    protected $primaryKey = "id";
    protected $allowedFields = ["type", "description", "date", "amount"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    public function saveData($data){
        $this->save([
            "type" => htmlspecialchars($data["type"]),
            "description" => strtolower(htmlspecialchars($data["description"])),
            "date" => strtolower(htmlspecialchars($data["date"])),
            "amount" => strtolower(htmlspecialchars($data["amount"]))
        ]);
    }

    public function updateData($data){
        $this->save([
            "id" => htmlspecialchars($data["id"]),
            "type" => htmlspecialchars($data["type"]),
            "description" => strtolower(htmlspecialchars($data["description"])),
            "date" => strtolower(htmlspecialchars($data["date"])),
            "amount" => strtolower(htmlspecialchars($data["amount"]))
        ]);
    }

    public function deleteData($id){
        $this->delete($id);
    }

    public function getDataLaporanPengeluaranBulanan() {
        $data = $this->query("
            SELECT
                DATE_FORMAT(date, '%Y-%m') AS bulan_angka,
                DATE_FORMAT(date, '%Y-%m') AS bulan,
                SUM(" . $this->table . ".amount) AS amount
            FROM 
                " . $this->table . " 
            GROUP BY 
                DATE_FORMAT(date, '%Y-%m')
            ORDER BY 
                DATE_FORMAT(date, '%Y-%m') ASC;
        ")->getResultArray();
        foreach ($data as &$row) {
            $row['bulan'] = $this->ubahBulanKeBahasaIndonesia($row['bulan']);
        }
        return $data;
    }

    public function getDataLaporanPengeluaranHarian($bulan) {
        $data = $this->query("
            SELECT 
                DATE_FORMAT(date, '%Y-%m') AS bulan,
                DATE_FORMAT(date, '%Y-%m-%d') AS tanggal,
                SUM(" . $this->table . ".amount) AS amount
            FROM 
                {$this->table}
            WHERE DATE_FORMAT(date, '%Y-%m') = '$bulan'
            GROUP BY 
                DATE_FORMAT(date, '%Y-%m'),
                DATE_FORMAT(date, '%Y-%m-%d')
            ORDER BY 
                DATE_FORMAT(date, '%Y-%m-%d') ASC;
        ")->getResultArray();

        foreach ($data as &$row) {
            $row['bulan'] = $this->ubahBulanKeBahasaIndonesia($row['bulan']);
            $row['tanggal'] = $this->ubahTanggalKeBahasaIndonesia($row['tanggal']);
        }

        return $data;
    }

    private function ubahTanggalKeBahasaIndonesia($tanggal) {
        $datetime = \DateTime::createFromFormat('Y-m-d', $tanggal);
        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return $datetime->format('d') . ' ' . $namaBulan[$datetime->format('n') - 1] . ' ' . $datetime->format('Y');
    }

    private function ubahBulanKeBahasaIndonesia($bulan)
    {
        $datetime = \DateTime::createFromFormat('Y-m', $bulan);
        $namaBulan = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return $namaBulan[$datetime->format('n') - 1] . ' ' . $datetime->format('Y');
    }
}