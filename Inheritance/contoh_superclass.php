<?php
class person{
    private string $nama;
    private string $alamat;

    public function __construct(string $nama, string $alamat){
        $this -> nama = $nama;
        $this -> alamat = $alamat;
    }
    public function tampilkanInfo(): void{
        echo "Nama : " . $this -> nama . "<br>";
        echo "Alamat : " . $this -> alamat . "<br>";
    }
    //Getter untuk diakses subclass karena property private
    public function getNama(): string{
        return $this -> nama;
    }
    public function getAlamat(): string{
        return $this -> alamat;
    }
}
?>