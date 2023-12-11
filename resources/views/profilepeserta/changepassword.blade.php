<form method="POST" action="{{ route('sandi.proses', $rs->id) }}">
    @csrf
    <div class="row mb-3">
      <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
      <div class="col-md-8 col-lg-9">
        <input name="current_password" type="password" class="form-control" id="current_password">
      </div>
    </div>
  
    <div class="row mb-3">
      <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
      <div class="col-md-8 col-lg-9">
        <input name="new_password" type="password" class="form-control" id="new_password">
      </div>
    </div>
  
    <div class="row mb-3">
      <label for="renew_password" class="col-md-4 col-lg-3 col-form-label">Ulangi Password Baru</label>
      <div class="col-md-8 col-lg-9">
        <input name="renew_password" type="password" class="form-control" id="renew_password">
      </div>
    </div>
  
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Ubah Password</button>
    </div>
  </form>
  