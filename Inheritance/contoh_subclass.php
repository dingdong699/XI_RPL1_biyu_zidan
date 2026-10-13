<?php
 require "contoh_superclass.php";
 
class Siswa extends person {
    private string $nisn;

    public function __construct(string $nama,string $alamat,string $nisn){
        //Memanggil construct milih SuperClass
        parent::__construct($nama,$alamat);//warisan
        $this-> nisn= $nisn;

    }
    public function belajar(): void {
        echo"Siswa bernama " .$this->getNama()
        ." dengan nisn ". $this -> nisn . 
        "Sedang belajar mata pelajaran RPL";
    }
}
 //pengujian inheritance melalui pembuatan objek 
 $siswa1 = new Siswa("Ahmad Dani","Kendal","0087787");
 $siswa1->tampilkanInfo();//method warisan
 $siswa1->belajar();
?>