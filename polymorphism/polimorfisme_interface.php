<?php
  // Kita buat dulu interfacenya
  interface cetakTable {
      // Kontrak: yang meng-implements ini wajib punya method tampilkanCetak()
      public function tampilkanCetak(): void;
  }
    //buat kelas untuk berbagai macam objek
    //yang mengimplements interface
  class cetakManager{
     //menerima data maupn selama dia mengiplements
    //interface cetakTable (ini adalah penerapan polimorfisme nya)
   public static function prosesCetak(cetakTable $dokumen):void{
    //keyword static artinya : class bisa dipanggil langsung
    //tanpaharus ada objeknya
    $dokumen->tampilkanCetak();
   }
  }

  // Kelas laporanSiswa
  class laporanSiswa implements cetakTable {
      private string $namaSiswa;
      private string $kelas;

      public function __construct(string $nama, string $kelas) {
          $this->namaSiswa = $nama;
          $this->kelas = $kelas;
      }

      public function tampilkanCetak(): void {
          echo "<div style='border:1px solid green; padding: 10px; margin-bottom:10px;'>";
          echo "<h3>Cetak Dokumen : Raport Siswa</h3>";
          echo "Nama : {$this->namaSiswa} | Kelas : {$this->kelas}";
          echo "</div>";
      }
  }

  // Kelas laporanGuru
  class laporanGuru implements cetakTable {
      private string $namaGuru;
      private string $mataPelajaran;

      public function __construct(string $nama, string $mapel) {
          $this->namaGuru = $nama;             
          $this->mataPelajaran = $mapel;     
      }

      public function tampilkanCetak(): void {
          echo "<div style='border:1px solid blue; padding: 10px; margin-bottom:10px;'>";    
          echo "<h3>Cetak Dokumen : Jadwal/Data Guru</h3>";
          echo "Nama Guru : {$this->namaGuru} | Mapel : {$this->mataPelajaran}";
          echo "</div>";    
      }
  }
  
  // Membuat objek siswa
  $siswa1 = new laporanSiswa("Ahmad Naruto", "10 IPA 1");
  $siswa2 = new laporanSiswa("Sakura Lestari", "12 TKR 5");
  $siswa3 = new laporanSiswa("Dimas Arla Nova", "11 RPL 1");
   $siswa4 = new laporanSiswa("Muhammad Yafi Nadhir Amrullah", "11 RPL 1");
  // Membuat objek guru
  $guru1 = new laporanGuru("Muhammad Yafi Nadhir Amrullah. S.S", "Matematika");
  $guru2 = new laporanGuru("Haris Galih Fauzi. S.kom","Produktif");
  echo "<h1><u>Daftar Cetak Dokumen Sekolah</u></h1>";
  //mencetak menggunakan class cetakManager(Hasil polimorfisme)
  cetakManager::prosesCetak($siswa1);
  cetakManager::prosesCetak($siswa2);
  cetakManager::prosesCetak($siswa3);
  cetakManager::prosesCetak($guru1);
  cetakManager::prosesCetak($guru2);
?>