<?php

use Illuminate\Database\Seeder;
use App\scholarship;

class ScholarshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scholarship::insert([
            [
                'name'          => 'PEMBUKAAN BEASISWA PPA PERIODE JANUARI - JUNI 2018',
                'firm'          => 'Dikti',
                'description'   => 'Dibuka kembali Beasiswa PPA untuk periode Januari - Juni 2018 dengan persyaratan sebagai berikut :
                                    PERPANJANGAN (bagi penerima periode Juli – September 2017) :
                                    1.       Mahasiswa Aktif D3 minimal semester 4 - 6
                                    2.       Mahasiswa Aktif S1 regular minimal semester 4 – 8
                                    3.       Nilai IPK Terakhir lebih besar dari semester sebelumnya
                                    4.       Perpanjangan hanya daftar online di alamat http://bit.ly/prpjanjun18
                                    
                                    PENDAFTAR BARU :
                                    1.       Mahasiswa Aktif D3 minimal semester 4 - 6
                                    2.       Mahasiswa Aktif S1 regular minimal semester 4 - 8
                                    3.       Nilai IPK terakhir minimal 3.00
                                    4.       Download formulir pendaftaran dan berkas yang harus dikumpulkan disini
                                    5.       Besar dana beasiswa Rp 400.000/bulan dibayarkan setiap 6 bulan sekali
                                    
                                    Tempat Pengumpulan Berkas :
                                    1.       Mahasiswa D3 di Loket Pelayanan Beasiswa Kampus Diploma IPB (kolektif tidak langsung ke IPB Dramaga, jika langsung akan ditolak)
                                    2.       Mahasiswa S1 di Loket Pelayanan Beasiswa Gedung Andi Hakim Nasoetion Lantai 1
                                    
                                    Batas Waktu Pengumpulan Berkas :
                                    Hari / Tanggal : Senin, 23 April 2017
                                    Pukul : 14.00 WIB',
                'applyOnline'   => '1',
                'image'         => 'beasiswa/78d607068cd064420401737e12f83bae_XL.jpg',
                'admin_id'      => '1',
            ],
            [
                'admin_id'      => '1',
                'name'          => 'PEMBUKAAN BEASISWA PLN 2017 PERIODE DES 2017 – SEPT 2018',
                'firm'          => 'PLN',
                'description'   => '<p>Dalam rangka pelaksanaan program BUMN Hadir di Kampus, PLN sebagai salah satu BUMN Indonesia memberikan Bantuan Program Pendidikan dalam bentuk Beasiswa PLN 2017 untuk 50 mahasiswa IPB. Adapun nominal Beasiswa PLN 2017 yang diberikan sebesar Rp 5.000.000,-/mahasiswa untuk periode Desember 2017 &ndash; September 2018.</p>

                                    <p>&nbsp;</p>
                                    
                                    <p>Persyaratan :</p>
                                    
                                    <p>1. Mahasiswa aktif IPB S1 dan D3.</p>
                                    
                                    <p>2. Mahasiswa yang membutuhkan bantuan pendidikan.</p>
                                    
                                    <p>3. Mahasiswa yang memiliki prestasi yang bagus.</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>Berkas yang&nbsp;<strong>harus&nbsp;</strong>dikumpulkan :</p>
                                    
                                    <p>1. Fotocopy Kartu Tanda Mahasiswa</p>
                                    
                                    <p>2. Formulir yang Sudah Ditanda Tangani Dekan/Wadek/PA. Formulir bisa download di http://bit.ly/formPLN17</p>
                                    
                                    <p>3. Fotocopy Transkrip Nilai Semester Terakhir. Untuk mahasiswa semester 1 silahkan bisa melampirkan fotokopi nilai rapor.</p>
                                    
                                    <p>4. Surat Keterangan Penghasilan Orangtua atau Surat Pernyataan Penghasilan Orangtua</p>
                                    
                                    <p>&nbsp;&nbsp;&nbsp; Bermaterai Bagi Yang Berwirausaha atau Slip Gaji Orang Tua</p>
                                    
                                    <p>5. Fotocopy Kartu Keluarga</p>
                                    
                                    <p>6. Surat Keterangan Tidak Mampu Dikeluarkan Oleh Lurah/Kepala Desa (jika ada)</p>
                                    
                                    <p>7. Surat Pernyataan Alasan Kenapa Saya Harus Diterima di Beasiswa PLN 2017.</p>
                                    
                                    <p>8. Fotocopy Piagam Atau Bukti Prestasi Lainnya (ko-kurikuler atau ekstra kurikuler)</p>
                                    
                                    <p>9. Fotocopy sertifikat MPKMB</p>
                                    
                                    <p>10. Fotocopy halaman depan buku rekening BNI (BNI konvensional bukan BNI Syari&rsquo;ah) atas nama sendiri yang masih</p>
                                    
                                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AKTIF.</p>
                                    
                                    <p>11. Daftar Online di http://bit.ly/onlinePLN17</p>
                                    
                                    <p>12. Berkas disusun dan dihekter rapi &ldquo; TANPA MAP &rdquo; berdasarkan urutan no 1-10</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p><strong>Timeline :</strong></p>
                                    
                                    <p>28 November - 08 Desember 2017 : Pengumpulan berkas</p>
                                    
                                    <p>09 - 31 Desember 2017 : Seleksi berkas</p>
                                    
                                    <p>01-10 Januari 2018 : Fiksasi penetapan hasil seleksi<br />
                                    11 Januari 2018 : Pengumuman penerima Beasiswa PLN 2017</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p><strong>PENTING!</strong></p>
                                    
                                    <p>Berkas pelamar S1 dikumpulkan ke Loket Beasiswa IPB. Sedangkan berkas pelamar D3 dikolektifkan di Kesma BEM Vokasi.<br />
                                    Pengumpulan Berkas Terkahir Pukul 12.00 WIB</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p><strong>HANYA BERKAS YANG RAPI DAN URUT, YANG AKAN DITERIMA</strong></p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>Terima Kasih</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>Subdit Kesejahteraan Mahasiswa</p>
                                    
                                    <p>Direktorat Kemahasiswaan</p>
                                    
                                    <p>Institut Pertanian Bogor</p>
                                    
                                    <p>2017</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>STUDENT FIRST,</p>
                                    
                                    <p>&nbsp;</p>
                                    
                                    <p>trust, respect, and responsibility</p>',
                'applyOnline'   => '1',
                'image'         => 'beasiswa/PFU7KpxlEJiRkdHkyGvK2Yf8GulvnVducnF4y37D.png'
            ],
            
        ]);
    }
}
