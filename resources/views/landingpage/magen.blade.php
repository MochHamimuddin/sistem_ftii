@extends('landingpage.index')
@section('content')

<section id="counts" class="counts">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2 class="mt-5">Program Magenta</h2>
          </div>
      <div class="row">
        <div class="image col-xl-5 d-flex  justify-content-center justify-content-xl-center" data-aos="fade-right" data-aos-delay="150">
          <img src="{{ asset('landingpage/assets/img/clients/client-3.png')}}" alt="" class="img-fluid">
        </div>
        <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
          <div class="content d-flex flex-column justify-content-center">
            <div class="row">
                <p class="text-start">Kementerian BUMN dan Forum Human Capital Indonesia (FHCI) bersinergi dengan seluruh BUMN di Indonesia untuk dapat memberikan kesempatan magang bagi mahasiswa dan fresh graduate baik lulusan dalam negeri maupun luar negeri.

                   <br/><br/>Magang Generasi Bertalenta (MAGENTA) BUMN adalah program magang terpadu bagi santri, mahasiswa dan fresh graduate untuk mengaplikasikan semua ilmu yang telah didapat dengan cara mempraktekkan secara langsung di dunia kerja sehingga mendapatkan tambahan pengetahuan dan skill tentang standar kerja profesional di BUMN.

                    <br/><br/>Pengalaman yang didapat dari program MAGENTA BUMN akan menjadi bekal berharga dalam menjalani jenjang karir sesungguhnya untuk meraih masa depan gemilang.
                </p>

                <div class="btn-wrap mt-5">
                    <a href="https://magentaku.id/lowongan" class="btn btn-outline-primary">Lihat Lowongan Tersedia <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
          </div><!-- End .content-->
        </div>
      </div>
    </div>
</section>
    <section id="pricing" class="pricing">
        <div class="container">

          <div class="section-title">
            <h2>Jenis Magang</h2>
            <p class="text-start">MAGENTA BUMN terdiri atas 4 program yang meliputi Magang Santri, Magang Umum, Indonesia Global Talent Internship, dan Kampus Merdeka @BUMN dengan penjelasan sebagai berikut:</p>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="box" data-aos="zoom-in-right" data-aos-delay="200" >
                  <img src="{{ asset('landingpage/assets/img/clients/magen-1.jpg')}}" class="card-img-top">
                  <h3><strong>Magang Umum</strong></h3>
                  <h3>Magang Umum merupakan sebuah program magang yang terintegrasi serta bentuk enhancement dari magang-magang BUMN yang sebelumnya dijalankan secara mandiri oleh masing-masing BUMN. Magang Umum yang diperuntukkan bagi mahasiswa aktif serta fresh graduate dengan durasi yang variatif, mulai dari 1 bulan hingga maksimal 12 bulan.</h3>
                </div>
              </div>
    </div>
  </section>
@endsection
