<?php
     //buat parent class
     class karyawan{
        private $nama;
        protected $gajiPokok;

        public function __construct($nama, $gajiPokok){
            $this -> nama = $nama;
            $this -> gajiPokok = $gajiPokok;
        }
        public function getNama(){
            return $this -> nama;
        }
        //method asli untuk gaji pokok
        public function hitungTotalGaji(){
            return $this -> gajiPokok;
        }
     }
    //buat child class/kelas turunan
    class manager extends karyawan{
        private $bonus;

        public function __construct($nama, $gajiPokok, $bonus){
            //panggil konstruk parent
            parent :: __construct($nama, $gajiPokok);
            $this -> bonus = $bonus;
        }
        public function getBonus(){
            return $this -> bonus;
        }
    }
    //penggunaan code
$staff = new karyawan("yafi", 10000000);
$manager = new manager("dimas", 10000000, 2000000);
//1. staff menggunakan method bawaan karyawan 
echo "Nama Karyawan : " . $staff -> getNama() . " | Total Gaji : Rp. " . number_format($staff -> hitungTotalGaji(),0,',','.'). "<br>";
$totalGajiManajer = $manager->hitungTotalGaji() + $manager->getBonus();
echo "Nama Manager : " . $manager -> getNama() . " | Total Gaji : Rp. " . number_format($totalGajiManajer,0,',','.'). "<br>";
?>