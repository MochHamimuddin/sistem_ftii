<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\KategoriAdm;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Notifications\BerkasApprovedNotification;

class AdmAdminController extends Controller
{
    public function index()
    {
        $kategori_adm = KategoriAdm::select('id', 'nama', 'status', 'tanggal_mulai', 'tanggal_akhir')->get();
        return view('administrasi.adminis', compact('kategori_adm'));
    }
    public function status($id)
    {
        $kategori_adm = KategoriAdm::findOrFail($id);

        if ($kategori_adm->status == 1) {
            $kategori_adm->status = 0;
        } else {
            $kategori_adm->status = 1;
        }

        $kategori_adm->save();
        alert()->success('Success','Status jadwal berhasil di update.');
        return redirect()->back()->with('success', 'Status jadwal updated successfully.');
    }

    public function viewFile($id)
    {
        $administrasi = Administrasi::findOrFail($id);
        return response()->file(Storage::path($administrasi->berkas));
    }

    public function Keterangan($id)
    {
        $administrasi = Administrasi::findOrFail($id);

        if ($administrasi->keterangan == 1) {
            $administrasi->keterangan = 2;
        } else {
            $administrasi->keterangan = 1;
        }

        $administrasi->save();
        alert()->success('Success','Status jadwal berhasil di update.');
        return redirect()->back()->with('success', 'Status jadwal updated successfully.');
    }

    public function detailAdminis($id)
    {
        $kategori_adm = KategoriAdm::findOrFail($id);
        $mahasiswas = Mahasiswa::whereHas('administrasis', function ($query) use ($id) {
            $query->where('kategori_adm_id', $id);
        })->with('administrasis')->get();

        return view('administrasi.adminis_detail', compact('kategori_adm', 'mahasiswas'));
    }


    public function create()
    {
        return view('administrasi.adminis_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'status' => 'nullable',
        ], [
            // validation messages
        ]);

        KategoriAdm::create($request->all());

        return redirect()->route('kategori_adm.index')->with('success', 'Kategori administrasi berhasil disimpan');
    }
    public function edit($id)
{
    $kategori_adm = KategoriAdm::findOrFail($id);
    return view('administrasi.adminis_edit', compact('kategori_adm'));
}

public function update(Request $request, $id)
{
    $kategori_adm = KategoriAdm::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_akhir' => 'required',
        'status' => 'nullable',
    ], [
        // validation messages
    ]);

    $kategori_adm->update($request->all());

    return redirect()->route('kategori_adm.index')->with('success', 'Kategori administrasi berhasil diperbarui');
    }
    public function destroy($id)
    {
    $kategori_adm = KategoriAdm::findOrFail($id);
    $kategori_adm->delete();

    return redirect()->route('kategori_adm.index')->with('success', 'Kategori administrasi berhasil dihapus');
    }

}
