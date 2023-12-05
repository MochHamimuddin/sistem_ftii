<form>
    <div class="row mb-3">
      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
      <div class="col-md-8 col-lg-9">
        <img src="{{ asset('admin/img/profile-img.jpg')}}">
        <div class="pt-2">
          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
        </div>
      </div>
    </div>

    <div class="row mb-3">
      <label for="nim" class="col-md-4 col-lg-3 col-form-label">Nim</label>
      <div class="col-md-8 col-lg-9">
        <input name="nim" type="number" class="form-control" id="nim" value="2003015150">
      </div>
    </div>
    <div class="row mb-3">
        <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
        <div class="col-md-8 col-lg-9">
          <input name="nama" type="text" class="form-control" id="nama" value="Kevin Anderson">
        </div>
      </div>
    <div class="row mb-3">
      <label for="about" class="col-md-4 col-lg-3 col-form-label">Tentang Saya</label>
      <div class="col-md-8 col-lg-9">
        <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea>
      </div>
    </div>
    <div class="row mb-3">
        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
        <div class="col-md-8 col-lg-9">
          <input name="email" type="text" class="form-control" id="email" value="uhamka.ac.id">
        </div>
      </div>
    <div class="row mb-3">
      <label for="notelp" class="col-md-4 col-lg-3 col-form-label">No Telpon</label>
      <div class="col-md-8 col-lg-9">
        <input name="notelp" type="text" class="form-control" id="notelp" value="081233838624">
      </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-md-4 col-lg-3 col-form-label">Alamat Lengkap</label>
        <div class="col-md-8 col-lg-9">
          <textarea name="alamat" class="form-control" id="alamat" style="height: 80px">Pasar Rebo</textarea>
        </div>
      </div>
    <div class="row mb-3">
      <label for="mitra" class="col-md-4 col-lg-3 col-form-label">Nama Mitra</label>
      <div class="col-md-8 col-lg-9">
        <input name="mitra" type="text" class="form-control" id="mitra" value="MBKM">
      </div>
    </div>

    <div class="row mb-3">
      <label for="program" class="col-md-4 col-lg-3 col-form-label">Program</label>
      <div class="col-md-8 col-lg-9">
        <input name="program" type="text" class="form-control" id="program" value="Bangkit">
      </div>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </div>
  </form>
