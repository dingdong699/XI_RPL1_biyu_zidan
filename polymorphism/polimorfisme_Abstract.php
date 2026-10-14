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
        parent::__construct($penerima,$pesan);
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
  class NotifWa extends NotifikasiWeb{
    //wajib override abstract method dari parent
    public function kirimNotifikasi(): void {

    echo "<div style = 'border:2px solid #28a745;
                        padding:10px;
                        margin-bottom:10px;
                        background-color: #e8f5e9;
                        '>";
    echo "<h4>[WhatsApp MASSAGE]</h4>";
    echo "<p>{$this->getInfoPengiriman()}</p>";
    echo "<p?>Pesan: <i>{$this->pesan}</i></p>";
    echo "</div>";

    }
  }
  //kelas turunan 3 : modifikasi browser
  class notifbrowser extends NotifikasiWeb{
    private string $browserApp;

    public function __construct(string $penerima, string $pesan, string $browserApp)
    {
        parent::__construct($penerima, $pesan);
        $this->browserApp=$browserApp;
    }
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:1px solid #ffc107;
        padding:10px;
        margin-bottom:10px;
        background-color: #fff3cd'>";

        echo "<h4>[PUSH NOTIF] - browser: {$this->browserApp}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>notif: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
  }
  //kelas turunan 4 : modifikasi browser
  class NotifGithub extends NotifikasiWeb{
    private string $repo;

    public function __construct(string $penerima, string $pesan, string $repo)
    {
        parent::__construct($penerima, $pesan);
        $this->repo=$repo;
    }
    public function kirimNotifikasi(): void
    {
        echo "<div style='border:1px solid #6f42c1;
        padding:10px;
        margin-bottom:10px;
        background-color: #f3e5f5'>";

        echo "<h4>[GITHUB NOTIF] - Repo: {$this->repo}</h4>";
        echo "<p>{$this->getInfoPengiriman()}</p>";
        echo "<p>notif: <i>{$this->pesan}</i></p>";
        echo "</div>";
    }
  }

  //Buat class manager untuk menerapkan polimorfisme
  class NotifManager{
    //Menerima tipe data berdasar abstract class
    //apapun objeknya,asalkan turunan notifikasiWeb, bisa masuk
    public static function prosesKirim(NotifikasiWeb $notif):void{
        $notif->kirimNotifikasi();
  } 
}

//Penggunaan dan instalasi objek 
echo "<h2> Dashboard Simulasi Pengiriman Notifikasi Web</h2>";

//membuat berbagai macam objek notif
$notif1 = new NotifEmail("zidangoks@gmail.com",
"MXKING KU READY BOSS.", "Info onarrr");
$notif2 = new NotifWa("087747673245", "Telah lupa rasa nya kita bersama , kau pergi tanpa memberi kata, kita bertemu tanpa bertukar sapa. <br> berdebar hati ku, melihat tangan mu berpegang dengan seseorang yg tak familar.");
$notif3 = new NotifBrowser("Token_Device_ROG", "Ada diskon 40% untuk produk pilihan anda!.", "Google Chrome");
$notif4 = new NotifGithub("biyuasoyyy@gmail.com", "hai ini apa aku pinjam yah apa codingan nya ya ok love you <3 .", "my-repo");

//Mengirimkan dan menampilan semua notif secara
//Polimorfisme melalui manager
NotifManager::prosesKirim($notif1);
NotifManager::prosesKirim($notif2);
NotifManager::prosesKirim($notif3);
NotifManager::prosesKirim($notif4);

?>