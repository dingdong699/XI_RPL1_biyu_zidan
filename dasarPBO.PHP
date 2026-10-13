<?php
    //pseucode dari contoh element PBO 
    //class = karyawan
    //property = nip, nama, gaji
    //method = aturGaji(), tampilData()
    //object = karyawan_havids, karyawan_yavi, karyawan_dimas
                //123
                //havids huda
                //25000000
    class karyawan{
        //Property
        public int $nip;
        public string $nama;
        public float $gaji = 0;
        //Method
        public function aturGaji(float $gaji){
           $this->gaji += $gaji;
        }
        public function tampilData(){
            echo "Ini Adalah Karyawan NextJourney <br>";
            echo "NIP : " . $this -> nip . "<br> ";
            echo "Nama : " . $this -> nama . "<br>";
            echo "Gaji : Rp. " . number_format($this -> gaji, 0, ',', '.') . "<br>";
            echo "============================== <br>";
        }
    }
    //Object
    $karyawan1 = new karyawan();
    $karyawan1 -> nip = 10297;
    $karyawan1 -> nama = "havids";
    $karyawan1 -> gaji = 25000000;
    $karyawan1 -> aturGaji(5000000);
    $karyawan1 -> tampilData();

    echo"<br>";

    $karyawan2 = new karyawan();
    $karyawan2 -> nip = 10298;
    $karyawan2 -> nama = "yavi";
    $karyawan2 -> gaji = 20000000;
    $karyawan2 -> aturGaji(5000000);
    $karyawan2 -> tampilData();

    echo"<br>";

    $karyawan3 = new karyawan();
    $karyawan3 -> nip = 10299;
    $karyawan3 -> nama = "dimas";
    $karyawan3 -> gaji = 2000000;
    $karyawan3 -> aturGaji(5000000);
    $karyawan3 -> tampilData();

    echo "<br>";

    echo "INI ADALAH HASI DARI PARA PETINGGI NEXTJOURNEY";
?>