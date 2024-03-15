@extends('admin.index')
@section('content')

        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="filter">
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                      <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                  </ul>
                                </div>

                                <div class="card-body">
                                  <h5 class="card-title">Konversi MK Wajib</h5>
                                  <div class="activity">
                                    <table class="table">
                                        <thead>
                                            <th>Nama MK</th>
                                            <th>Jumlah SKS</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                             <td>
                                                Pemrograman Berorientasi Obyek
                                             </td>
                                             <td>
                                                3 SKS
                                             </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Interaksi Manusia dan Komputer
                                                </td>
                                                <td>
                                                   3 SKS
                                                </td>
                                               </tr>
                                               <tr>
                                                <td>
                                                   Pengantar Kecerdasan Tiruan
                                                </td>
                                                <td>
                                                   3 SKS
                                                </td>
                                               </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                              </div><!-- End Recent Activity -->
                          </div>
                          <div class="col-xxl-4 col-md-6">
                            <div class="card">
                                <div class="filter">
                                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                      <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                  </ul>
                                </div>

                                <div class="card-body">
                                  <h5 class="card-title">Konversi MK Pengayaan</h5>
                                  <div class="activity">
                                    <table class="table">
                                        <thead>
                                            <th>Nama MK</th>
                                            <th>Jumlah SKS</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                             <td>
                                                Kewirausahaan Sosial
                                             </td>
                                             <td>
                                                2 SKS
                                             </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Publikasi Ilmiah
                                                </td>
                                                <td>
                                                   2 SKS
                                                </td>
                                               </tr>
                                               <tr>
                                                <td>
                                                   Kepemimpinan
                                                </td>
                                                <td>
                                                   2 SKS
                                                </td>
                                               </tr>
                                        </tbody>
                                    </table>
                                </div>
                                </div>
                              </div><!-- End Recent Activity -->
                              <!-- Website Traffic -->
                          </div>
                          <div class="col-12">
                          </div>
                        </div>
                </div>
          <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card">
              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body">
                <h5 class="card-title">Konversi MK Peminatan</h5>
                <div class="activity">
                    <table class="table">
                        <thead>
                            <th>Jenis Peminatan</th>
                            <th>Nama MK</th>
                            <th>Jumlah SKS</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    Multimedia
                                </td>
                             <td>
                                Pengolahan Citra Digital
                             </td>
                             <td>
                                3 SKS
                             </td>
                            </tr>
                            <tr>
                                <td>
                                    Rekayasa Perangkat Lunak
                                </td>
                                <td>
                                   Data Mining
                                </td>
                                <td>
                                   3 SKS
                                </td>
                               </tr>
                               <tr>
                                <td>
                                    Jaringan Komputer
                                </td>
                                <td>
                                   Jaringan Nirkabel
                                </td>
                                <td>
                                   3 SKS
                                </td>
                               </tr>
                        </tbody>
                    </table>

                </div>
              </div>
            </div><!-- End Recent Activity -->
          </div>
        </div>
    </section>
@endsection
