    <h5 class="card-title">Biodata {{ auth()->user()->role }}</h5>

    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Nim</div>
        <div class="col-lg-9 col-md-8">{{ $rs->nim}}</div>
      </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
      <div class="col-lg-9 col-md-8">{{ $rs->name}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label ">Jenis Kelamin</div>
        <div class="col-lg-9 col-md-8">{{ $rs->jenis_kelamin}}</div>
      </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label">Email</div>
      <div class="col-lg-9 col-md-8">{{ $rs->email}}</div>
    </div>

    <div class="row">
      <div class="col-lg-3 col-md-4 label">No Telpon</div>
      <div class="col-lg-9 col-md-8">{{ $rs->telpon}}</div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-4 label">Alamat Lengkap</div>
        <div class="col-lg-9 col-md-8">{{ $rs->alamat}} </div>
      </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label">Nama Mitra</div>
      <div class="col-lg-9 col-md-8">{{ $mitra->nama}}</div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-4 label">Program</div>
      <div class="col-lg-9 col-md-8">{{ $programs->nama}} </div>
    </div>
