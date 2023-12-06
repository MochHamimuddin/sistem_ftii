@extends('admin.index')
@section('content')

<div class="pagetitle">
    <h1>Data Dosen Pembimbing</h1>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">NIDN</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Email</th>
                  <th scope="col">Password</th>
                  <th scope="col">No telp</th>
                  <th scope="col">Program</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Brandon Jacob</td>
                  <td>Designer</td>
                  <td>Designer</td>
                  <td>28</td>
                  <td>Designer</td>
                  <td>MBKM</td>
                  <td>
                    <a class="btn btn-primary" href="#"><i class="bi bi-search"></i></a>
                    <a class="btn btn-warning" href="#"><i class="bi bi-pencil-square"></i></a>
                    <a class="btn btn-danger" href="#"><i class="bi bi-trash"></i></a>
                  </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Brandon Jacob</td>
                    <td>Designer</td>
                    <td>Designer</td>
                    <td>28</td>
                    <td>Designer</td>
                    <td>MBKM</td>
                    <td>
                      <a class="btn btn-primary" href="#"><i class="bi bi-search"></i></a>
                      <a class="btn btn-warning" href="#"><i class="bi bi-pencil-square"></i></a>
                      <a class="btn btn-danger" href="#"><i class="bi bi-trash"></i></a>
                    </td>
                  </tr>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection
