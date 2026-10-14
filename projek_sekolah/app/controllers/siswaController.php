<?php
//buat namespace utnuk controllers
namespace App\controllers;

//kita panggil namespace model siswa -> menggunakan use
use App\Models\siswa;

//buat kelas baru
class siswaController{
//method proses data
    public function prosesData(){
        //simulasi ambil data dari model (yang nanti nya dari database
        $siswa1 = new siswa("257041", "Zidan", "XI", "RPL");
        $siswa2 = new siswa("257001", "Biyu", "XI", "RPL");

        //kontroler untuk memproses dan merender tampilan HTML
        echo "<div style='
        border:2px solid #007bff;
        padding: 15px;
        border-radius: 8px;
        font-family: sans-serif;
        background: #f8f9fa;
        '>";

        echo "<h3 style='
        color: #007bff;
        margin-top: 0;
        '> data profil siswa (via controller)</h3>";

        echo "<b> NIS:</b> {$siswa1->getNis()} <br>";
        echo "<b> Nama:</b> {$siswa1->getNama()} <br>";
        echo "<b> Kelas:</b> {$siswa1->getKelas()} <br>";
        echo "<b> Jurusan:</b> {$siswa1->getJurusan()} <br>";
        echo "</div> <br>";

        echo "<div style='
        border:2px solid #007bff;
        padding: 15px;
        border-radius: 8px;
        font-family: sans-serif;
        background: #f8f9fa;
        '>";

        echo "<h3 style='
        color: #007bff;
        margin-top: 0;
        '> data profil siswa (via controller)</h3>";

        echo "<b> NIS:</b> {$siswa2->getNis()} <br>";
        echo "<b> Nama:</b> {$siswa2->getNama()} <br>";
        echo "<b> Kelas:</b> {$siswa2->getKelas()} <br>";
        echo "<b> Jurusan:</b> {$siswa2->getJurusan()} <br>";
        echo "</div>";
    }
}
?>