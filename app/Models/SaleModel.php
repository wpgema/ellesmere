<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model{
    protected $table = "sale";
    protected $primaryKey = "id";
    protected $allowedFields = ["kode_penjualan", "telp", "customer_name", "transaksi_date", "total_product", "total_service", "total_price", "id_employe", "status", "jenis_pemesanan", "status_pembayaran", "note"];
    protected $useTimestamps = true;
    protected $returnType = "array";

    // metod untuk mengambil semua penjualan 
    public function getData($id){
        return $this->find($id);
    }

    // metod untuk mengambil semua penjualan 
    public function getAllData(){
        return $this->orderBy("id", "DESC")->findAll();
    }

    // method untuk mengambil data penjualan berdasarkan name
    // digunakan
    // ctl penjualan class auth
    public function getDataByKodePenjualan($kode_penjualan){
        return $this->query("SELECT * FROM " . $this->table . " WHERE kode_penjualan = '$kode_penjualan'")->getResultArray();
    }

    public function getDataByStatusPembayaran($data){
        $telp = $data["telp"];
        $status_pembayaran = $data["status_pembayaran"];
        $jenis_layanan = $data["jenis_layanan"];
        return $this->query("SELECT " . $this->table . ".id FROM " . $this->table . " INNER JOIN booking ON " . $this->table . ".kode_penjualan = booking.kode_booking WHERE " . $this->table . ".telp = '$telp' AND booking.jenis_layanan = '$jenis_layanan' AND " . $this->table . ".status_pembayaran != '$status_pembayaran'")->getResultArray();
    }

    public function getDataByStatusPembayaran1($data){
        $telp = $data["telp"];
        $status_pembayaran = $data["status_pembayaran"];
        $jenis_layanan = $data["jenis_layanan"];
        return $this->query("SELECT " . $this->table . ".id FROM " . $this->table . " INNER JOIN booking ON " . $this->table . ".kode_penjualan = booking.kode_booking WHERE " . $this->table . ".telp = '$telp' AND booking.jenis_layanan = '$jenis_layanan' AND " . $this->table . ".status_pembayaran = '$status_pembayaran'")->getResultArray();
    }

    // method untuk menambah data penjualan
    public function saveData($data){
        $this->save([
            "kode_penjualan" => strtolower(htmlspecialchars($data["kode_penjualan"])),
            "transaksi_date" => strtolower(htmlspecialchars($data["transaksi_date"])),
            "status" => strtolower(htmlspecialchars($data["status"])),
            "jenis_pemesanan" => strtolower(htmlspecialchars($data["jenis_pemesanan"]))
        ]);
    }

    // method untuk mengubah data penjualan
    public function updateData($data){
        $kode_penjualan = $data["kode_penjualan"];
        $telp = $data["telp"];
        $customer_name = $data["customer_name"];
        $total_product = $data["total_product"];
        $total_price = $data["total_price"];
        $status = $data["status"];
        $this->query("
            UPDATE " . $this->table . "
                SET 
            telp = '$telp',
            customer_name = '$customer_name',
            total_product = '$total_product',
            total_price = '$total_price',
            status = '$status'
                WHERE kode_penjualan = '$kode_penjualan'
        ");
    }

    public function updateStatusPembayaran($data){
        $kode_penjualan = $data["kode_penjualan"];
        $status_pembayaran = $data["status_pembayaran"];
        $this->query("
            UPDATE " . $this->table . "
                SET 
            status_pembayaran = '$status_pembayaran'
                WHERE kode_penjualan = '$kode_penjualan'
        ");
    }

    // method untuk menghapus data penjualan
    public function deleteData($id){
        $this->delete($id);
    }

    public function deleteDataByKodePenjualanOrBooking($kode_penjualan){
        $this->query(
            "DELETE FROM " . $this->table . " WHERE kode_penjualan = '$kode_penjualan'"
        );
    }

    // mengambil data penjualan selain id yang dikirim
    public function getAllDataNotThisId($id){
        return $this->query("SELECT * FROM " . $this->table . " WHERE id != $id")->getResultArray();
    }

    public function getDataByJenisPemesanan($jenis_pemesanan){
        return $this->query("SELECT * FROM " . $this->table . " WHERE jenis_pemesanan = '$jenis_pemesanan'")->getResultArray();
    }

    public function getDataPenjualanInnerJoinSaleDetailForBookingOffline($kode_penjualan){
        return $this->query("SELECT " . $this->table . ".kode_penjualan, " . $this->table . ".note, customer_name, transaksi_date, " . $this->table .".created_at, " . $this->table . ".telp, kode_product, total_product, total_price, total_service, product_price, product, qty, sub_total FROM " . $this->table . " INNER JOIN sale_detail ON " . $this->table . ".kode_penjualan = sale_detail.kode_penjualan WHERE " . $this->table . ".kode_penjualan = '$kode_penjualan'")->getResultArray();
    }

    public function getDataPenjualanInnerJoinSaleDetailForBookingOffline1($kode_penjualan){
        return $this->query("SELECT " . $this->table . ".kode_penjualan, customer_name, transaksi_date, " . $this->table .".created_at, " . $this->table . ".telp, kode_product, total_product, total_price, total_service, product_price, product, qty, sub_total FROM " . $this->table . " INNER JOIN sale_detail ON " . $this->table . ".kode_penjualan = sale_detail.kode_penjualan WHERE " . $this->table . ".kode_penjualan = '$kode_penjualan'")->getResultArray();
    }

    public function getLaporanPenjualan(){
        return $this->query("SELECT SUM(total_price) AS total_price, transaksi_date AS transaksi_date FROM " . $this->table . " GROUP BY transaksi_date")->getResultArray();
    }

    public function updateDataCustomer($data){
        $kode_penjualan = $data["kode_penjualan"];
        $customer_name = $data["name"];
        $telp = $data["telp"];

        $this->query(
            "UPDATE " . $this->table . 
                " SET 
                telp = '$telp',
                customer_name = '$customer_name' 
            WHERE kode_penjualan = '$kode_penjualan'"
        );
    }

    public function getDataByTelp($telp){
        return $this->query("SELECT * FROM " . $this->table . " WHERE telp = '$telp' ORDER BY id DESC")->getResultArray();
    }

    // mengambil data penjualan bulanan
    public function getDataLaporanPenjualanProdukBulanan() {
        $data = $this->query("
            SELECT
                DATE_FORMAT(transaksi_date, '%Y-%m') AS bulan_angka,
                DATE_FORMAT(transaksi_date, '%Y-%m') AS bulan,
                SUM(" . $this->table . ".total_price) AS total_price
            FROM 
                " . $this->table . " 
            GROUP BY 
                DATE_FORMAT(transaksi_date, '%Y-%m')
            ORDER BY 
                DATE_FORMAT(transaksi_date, '%Y-%m') ASC;
        ")->getResultArray();
        // Ubah format bulan menjadi bahasa Indonesia
        foreach ($data as &$row) {
            $row['bulan'] = $this->ubahBulanKeBahasaIndonesia($row['bulan']);
        }
        return $data;
    }

    public function getDataLaporanPenjualanProdukHarian($bulan) {
        $data = $this->query("
            SELECT 
                DATE_FORMAT(transaksi_date, '%Y-%m') AS bulan,
                DATE_FORMAT(transaksi_date, '%Y-%m-%d') AS tanggal,
                SUM(total_price) AS total_price,
                COUNT(id) AS jumlah_transaksi
            FROM 
                {$this->table}
            WHERE DATE_FORMAT(transaksi_date, '%Y-%m') = '$bulan'
            GROUP BY 
                DATE_FORMAT(transaksi_date, '%Y-%m'),
                DATE_FORMAT(transaksi_date, '%Y-%m-%d')
            ORDER BY 
                DATE_FORMAT(transaksi_date, '%Y-%m-%d') ASC;
        ")->getResultArray();

        foreach ($data as &$row) {
            $row['bulan'] = $this->ubahBulanKeBahasaIndonesia($row['bulan']);
            $row['tanggal'] = $this->ubahTanggalKeBahasaIndonesia($row['tanggal']);
        }

        return $data;
    }

    // fungsi untu mengubah format tanggal kedalam bahasa Indonesia
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