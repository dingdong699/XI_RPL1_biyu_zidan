<?php
 //panggil namespace
 use App\Models\siswa;
 //bisa digunakan alias jika nama kelas nya sama persis
 use App\controllers\siswaController;

 //membuat file kelas (nanti nya ini akan dilakukan composer/autoload)
 require_once 'App/Models/siswa.php';
 require_once 'App/controllers/siswaController.php';

 echo "<h2>Sistem informasi sekolah - SMK Texmaco Semarang </h2>";
 echo "<hr>";

 //instansiasi controller dan jalankan method
 $controller = new Siswacontroller();
 $controller->prosesData();

 //instansiasi objek
 $siswa1 = new siswa("257001", "Biyu", "XI", "RPL");
 echo "<br> NIS : " . $siswa1->getNis() . "<br>";
 echo "NAMA : " . $siswa1->getNama() . "<br>";
 echo "KELAS : " . $siswa1->getKelas() . "<br>";
 echo "JURUSAN : " . $siswa1->getJurusan() . "<br>";
 ?>