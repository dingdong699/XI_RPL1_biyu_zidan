<?php
//contoh konsep enkapsulasi
 CLASS BankNJ{
    //Property dengan akses private
    private $namaPemilik;
    private $nomorRekening;
    private $saldo;
    private $pin;
    //method constructor
    public function __construct($namaPemilik, $nomorRekening,  $saldo, $pin){
        $this->namaPemilik = $namaPemilik;
        $this->nomorRekening = $nomorRekening;
        $this->setSaldo($saldo); //pemanggilan setter (agar bisa tervalidasi) 
        $this->setPin($pin);
    }
    //getter untuk nomer rekening(read only)
    public function getNomorRekening(){
        return $this->nomorRekening; //tidak ada setter, karena nomor rekening endah dibuat dan tidak bisa diubah
    }
    public function getNamaPemilik(){
        return $this->namaPemilik;
    }
    public function getSaldo(){
        return "Rp. " . number_format($this->saldo, 2, ',', '.');
    }
    public function setSaldo($jumlah){
        //buat validasi saldo tidak boleh negatif
        if ($jumlah >= 0){
            $this -> saldo = $jumlah;
        } else {
            echo "error : saldo awal/perubahan tidak valid <br>";
        }
    }
    //buat getter untuk pin (write only/terenkripsi:terlindungi)
    public function setPin($pinBaru){
        if(preg_match('/^[0-9]{6}$/', $pinBaru)){
            $this->pin = password_hash($pinBaru, PASSWORD_BCRYPT);
        } else {
            echo "error : pin harus 6 digit angka <br>";
        }
    }
    //TIDAK ADA GETTER UNTUK PIN, karena pin bersifat write only
 }
 $akun1 = new BankNJ("HaYaLa", "127-495-757", 55000, "123456");
   //membaca via getter
  echo "Nama Pemilik : " . $akun1->getNamaPemilik() . "<br>";
  echo "Nomor Rekening : " . $akun1->getNomorRekening() . "<br>";
  echo "Saldo : " . $akun1->getSaldo() . "<br>";
   //mengubah saldo via getter
  $akun1->setSaldo(55000000); //mengubah saldo
  echo "Saldo setelah diubah : " . $akun1->getSaldo() . "<br>";
   //ubah data dengan isi invalid
  $akun1->setPin("654321"); //mengubah pin
  echo "Pin berhasil diubah <br>";

  //pembuktian enkapsulasi
  //mencegah akses dari luar tanpa mengikuti  getter dan setter
  //bisa dibandingkan engan program sebelumnya pada cara pengaksesan property object 
  $akun1->saldo = 100000000; //akan fatal error karena sudah dienkapsulasi dengan private
?>