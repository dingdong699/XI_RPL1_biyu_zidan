<?php
//kita buat parent class
class Pegawai{
    protected $nama_pegawai;
    protected $gaji_pegawai;

    //method construct
    public function __construct($nama_pegawai,$gaji_pegawai) {
        $this->nama_pegawai=$nama_pegawai;
        $this->gaji_pegawai=$gaji_pegawai;
    } 
    //fungsi getter untuk ambil nama
    public function getNama(){
        return $this->nama_pegawai;
    }
    //method dasar di parent class
    public function hitungGaji(){
        return $this->gaji_pegawai;
    }
}

//Polimerfisme dengan Inheritance , menggunakan overriding
class freelancer extends Pegawai{
    private $projectRate;
    private $jumlahProject;

    public function __construct($nama_pegawai,$projectRate,$jumlahProject){
    //Gaji di buat 0, karena freelancer hanya dibayar per project
    parent::__construct($nama_pegawai,0);
     $this->projectRate = $projectRate;
     $this->jumlahProject= $jumlahProject;
    }
    //Overriding untuk menghitung ulang gaji
    //menimpa atau menulis kembali karakteristik method hitungGaji()
    public function hitungGaji(){
        return $this -> projectRate * $this -> jumlahProject;
    }    
}
//child class kedua
class karyawanTetap extends Pegawai{
    private $tunjangan;
    public function __construct($nama_pegawai,$gaji_pegawai,$tunjangan){
        parent:: __construct($nama_pegawai,$gaji_pegawai);
        $this->tunjangan=$tunjangan;
    }
    //Polimorfisme denga Overriding/Menimpa karakteristik
    public function hitungGaji()
    {
        //Ambil Gaji pokok dari parent lalu tambahkan tunjangan
        return parent::hitungGaji()+$this->tunjangan;

    }
} 
//buat fungsi untuk menerapkan polimorfism 
function cetakGaji(pegawai $pegawai){ //mwenerima objek dan turunannya
    echo "Gaji " . $pegawai -> getNama() . " : Rp." . number_format($pegawai->hitungGaji(),0,',','.'). "<br>";
}
//penggunaan class dan fungsi

$pegawaiBiasa = new pegawai("Yafi", 3000000);
$pegawaiFreelance = new freelancer("Dimas", 2000000, 4);
$pegawaiTetap = new karyawanTetap("Arla", 5000000, 2000000);

//menggunakan satu fungsi yang sama untuk berbagai objek
cetakGaji($pegawaiBiasa);
cetakGaji($pegawaiFreelance);
cetakGaji($pegawaiTetap);

?>