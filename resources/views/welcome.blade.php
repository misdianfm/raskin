@extends('layouts.welc')

@section('content') 

<div class=" custom-header">
    <div class=" custom-header-image" style=""></div>       
</div>

<div class="container-fluid">
    <div id="tulisan" style="font-size: 60px;">
        <p>
            <center>SISTEM PENDUKUNG KEPUTUSAN</center>
        </p>
        <p>
            <center>Penerima Bantuan Raskin</center>
        </p>
        <hr style="width: 70%;">
        <p style="font-size: 45px;text-align: center;">
            <small><i>Desa Pasir Wetan, Kecamatan Karanglewas</i></small>
        </p>
        <p style="font-size: 45px;text-align: center;">
            <small><i>Kabupaten Banyumas</i></small>
        </p>
        <center>
        	<a class="btn btn-primary btn-lg" href="#sekras" style="text-align: center;">Sekilas Raskin</a>
            <a class="btn btn-info btn-lg" href="{{ url('/hasilseleksi') }}" style="text-align: center;">Hasil Seleksi Raskin</a>
        </center>
    </div>

    <div class="row" style=""> 
        <div class="col-md-3"></div>
        <div class="col-md-6"  id="sekras"> 
            <br><br><br><br>
            <h1 align="center" class="huruf" style="font-size: 30px;">SEKILAS RASKIN</h1>
            <br><br>

            <div class="huruf" style="text-align: justify;">
            
                <p>
                    Penyaluran RASKIN (Beras untuk Rumah Tangga Miskin) sudah dimulai sejak 1998. Krisis moneter tahun 1998 merupakan awal pelaksanaan RASKIN yang bertujuan untuk memperkuat ketahanan pangan rumah tangga terutama rumah tangga miskin. Pada awalnya disebut program Operasi Pasar Khusus (OPK), kemudian diubah menjadi RASKIN mulai tahun 2002, RASKIN diperluas fungsinya tidak lagi menjadi program darurat (social safety net) melainkan sebagai bagian dari program perlindungan sosial masyarakat. Melalui sebuah kajian ilmiah, penamaan RASKIN menjadi nama program diharapkan akan menjadi lebih tepat sasaran dan mencapai tujuan RASKIN.
                </p>
                <p>
                    Penentuan kriteria penerima manfaat RASKIN seringkali menjadi persoalan yang rumit. Dinamika data kemiskinan memerlukan adanya kebijakan lokal melalui musyawarah Desa/Kelurahan. Musyawarah ini menjadi kekuatan utama program untuk memberikan keadilan bagi sesama rumah tangga miskin.
                </p>
                <p>
                    Sampai dengan tahun 2006, data penerima manfaat RASKIN masih menggunakan data dari BKKBN yaitu data keluarga prasejahtera alasan ekonomi dan keluarga sejahtera I alasan ekonomi. Belum seluruh KK Miskin dapat dijangkau oleh RASKIN. Hal inilah yang menjadikan RASKIN sering dianggap tidak tepat sasaran, karena rumah tangga sasaran berbagi dengan KK Miskin lain yang belum terdaftar sebagai sasaran.
                </p>
                <p>
                    Mulai tahun 2007, digunakan data Rumah Tangga Miskin (RTM) BPS sebagai data dasar dalam pelaksaaan RASKIN. Dari jumlah RTM yang tercatat sebanyak 19,1 juta RTS, baru dapat diberikan kepada 15,8 juta RTS pada tahun 2007, dan baru dapat diberikan kepada seluruh RTM pada tahun 2008. Dengan jumlah RTS 19,1 juta pada tahun2 008, berarti telah mencakup semua rumah tangga miskin yag tercatat dalam Survei BPS tahun 2005. Jumlah sasaran ini juga merupakan sasaran tertinggi selama RASKIN disalurkan. Penggunaan data Rumah Tangga Sasaran (RTS) hasil pendataan Program Perlindungan Sosial tahun 2008 (PPLS – 2008) dari BPS diberlakukan sejak tahun 2008 yang juga berlaku untuk semua program pengentasan kemiskinan yang dilaksanakan oleh Pemerintah.
                </p>
                <p>
                    Realisasi RASKIN selama 2005 - 2009 berkisar antara 1,6 juta ton - 3,2 juta ton. Dengan harga tebus Rp.1.000/kg sampai dengan 2007 dan Rp.1.600/kg sejak tahun 2008, RASKIN bukan hanya telah membantu rumah tangga miskin dalam memperkuat ketahanan pangannya, namun juga sekaligus menjaga stabilitas harga. RASKIN telah mengurangi permintaan beras ke pasar oleh sekitar 18,5 juta pada tahun 2009. Selain itu, perubahan harga tebus dari Rp.1.000/kg menjadi Rp.1.600/kg juga dengan mempertimbangkan anggaran dan semakin banyaknya rumah tangga sasaran yang dapat dijangkau. Harga ini juga masih lebih rendah dari harga pasar yang saat itu rata-rata sekitar Rp.5.000 – 5.500/kg.
                </p>
                <p>
                    Dampak RASKIN terhadap stabilisasi harga terlihat pada saat RASKIN hanya diberikan kurang dari 12 bulan (seperti pada tahun 2006 = 11 bulan dan tahun 2007 = 10 bulan). Harga beras akhir tahun 2006 dan awal 2007 serta akhir tahun 2007 dan awal 2008 meningkat tajam. Pada saat itulah, pemerintah melakukan Operasi Pasar Murni (OPM) dan Operasi Pasar Khusus dari Cadangan Beras Pemerintah (OPK - CBP).
                </p>
                <p>
                    Beberapa kendala dalam pelaksanaan RASKIN selama ini terutama dalam pencapaian ketepatan indikator maupun ketersediaan anggaran. Sampai dengan saat ini, jumlah beras yang akan disalurkan baru ditetapkan setelah anggarannya tersedia. Selain itu ketetapan atas jumlah beras raskin yang disediakan juga tidak selalu dilakukan pada awal tahun, dan sering dilakukan perubahan di pertengahan tahun karena berbagai faktor. Hal ini akan menyulitkan dalam perencanaan penyiapan stoknya, perencanaan pendanaan dan perhitungan biaya-biayanya.
                </p>
                <p>
                    Data RTS yang dinamis menjadi suatu kendala tersendiri di lapangan. Masih ada RTM di luar RTS yang belum dapat menerima RASKIN karena tidak tercatat sebagai RTS di BPS. Kebijakan lokal dan “keikhlasan” sesama RTM dalam berbagi, tidak jarang dipersalahkan sebagai ketidaktepatan sasaran.
                </p>
                <p>
                    Ketepatan harga terkendala dengan hambatan geografis. Jauhnya lokasi RTS dari Titik Ditsribusi mengakibatkan RTS harus membayar lebih untuk mendekatkan beras ke rumahnya. Harga tebus RASKIN oleh RTS tidak lagi seharga Rp.1.000/kg atau 1.600/kg karena RTS harus membayar biaya-biaya lain untuk operasional dan angkutan dari Titik Distribusi (TD) ke rumah mereka. Peran Pemerintah Kabupaten/Kota untuk membantu RTS mencapai tepat harga perlu terus didorong. Saat ini sudah banyak Pemerintah Kabupaten/Kota yang menyediakan dana APBD-nya untuk RASKIN.
                </p>
                <p>
                    Apresiasi bagi Pemerintah Kabupaten/Kota patut diberikan karena perhatian terhadap penyediaan dan pengalokasian APBD serta pengawalan terhadap pelaksanaan RASKIN. Kepedulian terhadap program RASKIN berarti kepedualian terhaap RTS yang muncul dari hati nurani untuk mengentaskan kemiskinan. Kesadaran bahwa RASKIN merupakan tugas bersama Pemerintah Pusat dan Daerah untuk membantu mengurangi beban pengeluaran 18,5 juta RTS (pada tahun 2009), perlu terus ditumbuhkan.
                </p>
                <p>
                    Untuk mencapai tepat sasaran, tepat harga dan tepat waktu, beberapa penyempurnaan terus dilakukan. Salah satunya adalah dengan pola distribusi yang berkembang tidak hanya melalui titik distribusi yang langsung disalurkan kepada RTS namun juga melalui Warung Desa (Wardes). Melalui Wardes, penyaluran RASKIN menjadi lebih dekat kepada RTS dan RTS membeli beras secara bertahap sesuai daya belinya selama 1 bulan dengan harga sesuai dengan ketetapan. Penyaluran melalui Wardes berawal dari pilot project pada akhir tahun 2008 dan mulai diimplementasikan sejak tahun 2009.
                </p>
                <p>
                    Melalui Wardes, sistem administrasi distribusi RASKIN juga yang dituangkan dalam Daftar Penerima Manfaat 1 (DPM 1), pembagian kartu RASKIN, dan realisasi penerimaan beras oleh RTS dapat diperbaiki mulai dari awal. Juga dimungkinkan dapat diterapkan sistem pembayaran melalui kerjasama dengan jaringan unit-unit perbankan di Desa/Kelurahan secara langsung.
                </p>
                <p>
                    Peningkatan ketepatan sasaran juga terus ditingkatkan melalui pendampingan pola distribusi melalui kelompok masyarakat pada tahun 2009. Distribusi RASKIN dilakukan oleh kelompok masyarakat yang umumnya berbasis keagamaan maupun oleh kelompok masyarakat miskin penerima manfaat RASKIN. (BULOG@2010)
                </p>
                <p>
                    <i>Sumber:<a href="http://www.bulog.co.id/sekilas_raskin.php" target="_blank">http://www.bulog.co.id/sekilas_raskin.php</a></i>
                </p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div> 
<br><br><br><br><br>
</div> 
@endsection
@section('footer')
    <!-- Footer -->
        <footer class="text-center">
            <div class="footer-below">
                <div class="container-fluid" style="background-color: rgb(217,217,217);">
                    <div class="row" style="padding-top: 25px; padding-bottom: 25px; padding-left: 60px; padding-right: 60px;">
                        <div class="navbar-header">
                            <?php $year = (new DateTime)->format("Y"); ?>
                            Copyright &copy;<?php echo $year; ?> Misdiandini Fadilla Mukti | Sistem Pendukung Keputusan Penerima Bantuan Raskin
                        </div>
                        <div class="nav navbar-top-links navbar-right">
                            <a href="{{ url('/bantuan') }}"> BANTUAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
@endsection
