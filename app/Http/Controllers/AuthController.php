<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Program;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login()
    {
       return view("layout.login");
    }
    public function prosesLogin(Request $request)
    {
       if (Auth::guard('mahasiswa')->attempt($request->only('email','password'))) {
        return redirect('/dashboard');
       }elseif(Auth::guard('user')->attempt($request->only('email','password'))){
        return redirect('/dashboard');
       }
       Session::flash('status','failed');
       Session::flash('message','Anda gagal login');

       return redirect('/login');
    }
    public function logout(Request $request)
    {
        if(Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
        }elseif(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
        }
        return redirect('/');
    }
    public function register(){
        $programs = Program::all();
        $maha = Mahasiswa::all();
        return view('layout.register',compact('programs','maha'));
    }
    public function create(Request $request){
        $request->validate([
            'nim'=>'required',
            'name'=>'required',
            'jenis_kelamin'=>'required',
            'semester'=>'required',
            'alamat' => 'required',
            'email'=>'required|unique:mahasiswa,email',
            'telpon' => 'required',
            'password' => 'required',
             'program_id' => 'required|exists:program,id'

        ],[
            'nim.required' => 'Mohon isi kolom NIM.',
            'name.required' => 'Mohon isi kolom Nama.',
            'jenis_kelamin.required' => 'Mohon pilih Jenis Kelamin.',
            'semester.required' => 'Mohon isi kolom Semester.',
            'alamat.required' => 'Mohon isi kolom Alamat.',
            'email.required' => 'Mohon isi kolom Email.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'telpon.required' => 'Mohon isi kolom Telpon.',
            'password.required' => 'Mohon isi kolom Password.',
            'program_id.required' => 'Mohon pilih Program.',
            'program_id.exists' => 'Program tidak valid.',

        ]);
        $program = Program::find($request->program_id);
        if (!$program) {
            return redirect('/register')->with('error', 'Program tidak valid.');
        }
        $data = [
            'nim'=>$request->nim,
            'name'=>$request->name,
            'jenis_kelamin'=>$request->jenis_kelamin,
            'semester'=>$request->semester,
            'alamat'=>$request->alamat,
            'email'=>$request->email,
            'telpon'=>$request->telpon,
            'password'=>hash::make($request->password),
            'foto' => '1.png',
            'program_id'=>$request->program_id,
            'remember_token' => Str::random(60),
        ];
        Mahasiswa::create($data);
        Session::flash('status','success');
       Session::flash('message','Anda Berhasil Register, silahkan login');
        return redirect()->route('register.form');
}
}