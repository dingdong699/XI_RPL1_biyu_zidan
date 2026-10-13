<?php
    //Kita buat abstract baru
    //abstract itu adalah kelas yang tidak bisa dipakai langsung jadi object
    abstract class NotifikasiWeb{
        protected string $penerima;
        protected string $pesan;

        public function __construct(string $penerima,string $pesan)
        {
            $this->penerima=$penerima;
            $this->pesan = $pesan;
        }

        //Method biasa yang bihsa diwariskan dan digunakan langsung oleh kelas turunannya
        public function getInfoPengiriman(): string{
            return "Mengirim ke: {$this->penerima}";
        }

        //Abstract Method: kontrak wajib yang harus di-overide oleh kelas turunannya
        abstract public function kirimNotifikasi(): void;
    }

    //Kelas turunan 1 : notifikasi via email
    class NotifEmail extends NotifikasiWeb{
     private string $subjek;

     public function __construct(string $penerima,string $pesan,string $subjek){
        return parent::__construct($penerima,$pesan);
        $this->subjek = $subjek;
     }

     //Wajib meng-override abstract method dari parent class 
     #[Override]
     public function kirimNotifikasi(): void{
        echo "<div style='border: 2px solid #007bff;
        padding:10px;
        background: color #f8f8f8;'>";

        echo "<h4> [EMAIL] - Subjek : {$this->subjek}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>Isi Pesan: <i>{$this->pesan}</i></p>";
        echo "</div>";
     }
}               
//kelas turunan 2: notifikasi via whatsApp
  class NotifWeb
?>              