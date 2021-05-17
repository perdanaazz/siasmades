<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
use Hash;
use Validator;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function index(){
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nik' => 'required|size:16|unique:mahasiswas',
            'nama' => 'required|min:3|max:50',
            'email' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat' => 'required',
            'kategori' => 'required',
            'foto' => 'required|file|image|max:5000',
        ],
        [
            'required' => ':attribute wajib diisi',
            'size' => ':attribute harus berukuran :size karakter',
            'unique' => ':attribute sudah pernah dipakai',
            'min' => ':attribute minimal 3 karakter',
            'max' => ':attribute maksimal 50 karakter',
            'file' => ':attribute harus diisi dengan file',
            'image' => ':attribute harus berupa gambar',
        ]);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nik = $validateData['nik'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->alamat = $validateData['alamat'];
        $mahasiswa->kategori = $validateData['kategori'];
        $file = $validateData['foto'];
        $extension = $file->getClientOriginalExtension();
        $filename = 'mhs-'.time() . '.' . $extension;
        $file->move(public_path().'/img',$filename);
        $mahasiswa->foto = $filename;
        $mahasiswa->save();
        
        return redirect()->route('siasmades.pengajuan')->with('pesan',"Pengajuan aspirasi berhasil");
    }
    public function pengajuan(){
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function show(Mahasiswa $mahasiswa){
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('show',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function edit(Mahasiswa $mahasiswa){
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return view('show',[
            'users' => $users,
            'mahasiswas' => $mahasiswas
        ]);
    }
    public function destroy(Mahasiswa $mahasiswa){
        $mahasiswa->delete();
        return redirect()->route('siasmades.pengajuan')->with('pesandua',"Hapus data $mahasiswa->nama berhasil");
    }
    public function search(Request $request){
        $users = User::all();
        $cari = $request->search;
        $result = Mahasiswa::where('nama', 'like', "%".$cari."%")->paginate();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function update(Request $request, Mahasiswa $mahasiswa){
        $validateData = $request->validate([
            'nik' => 'required|size:16|unique:mahasiswas',
            'nama' => 'required|min:3|max:50',
            'email' => 'required',
            'jenis_kelamin' => 'required|in:P,L',
            'alamat' => 'required',
            'kategori' => 'required',
            'foto' => 'required|file|image|max:5000',
        ],
        [
            'required' => ':attribute wajib diisi',
            'size' => ':attribute harus berukuran :size karakter',
            'unique' => ':attribute sudah pernah dipakai',
            'min' => ':attribute minimal 3 karakter',
            'max' => ':attribute maksimal 50 karakter',
            'file' => ':attribute harus diisi dengan file',
            'image' => ':attribute harus berupa gambar',
        ]);
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nik = $validateData['nik'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->email = $validateData['email'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->alamat = $validateData['alamat'];
        $mahasiswa->kategori = $validateData['kategori'];

        if($request->hasFile('foto')){
            $validateData = $request->validate([
                'foto' => 'required|file|image|max:5000',
            ],
            [
                'required' => ':attribute wajib diisi',
                'max' => ':attribute maksimal 50 karakter',
                'file' => ':attribute harus diisi dengan file',
                'image' => ':attribute harus berupa gambar',
            ]); 
            $file = $validateData['foto'];
            $extension = $file->getClientOriginalExtension();
            $filename = 'mhs-'.time() . '.' . $extension;
            $file->move(public_path().'/img',$filename);
            $mahasiswa->foto = $filename;
        }
        $mahasiswa->save();

        return redirect()->route('siasmades.pengajuan')->with('pesan',"Update aspirasi berhasil");
        // return redirect()->route('mahasiswas.show',['mahasiswa'=>$mahasiswa->id])->with('pesan',"Update data {$request->nama} berhasil");
    }
    public function sortykategori(){
        $users = User::all();
        $result = Mahasiswa::orderBy('kategori', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function sortytanggal(){
        $users = User::all();
        $result = Mahasiswa::orderBy('created_at', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function sortynama(){
        $users = User::all();
        $result = Mahasiswa::orderBy('nama', 'asc')->get();
        return view('rekap-pengajuan',[
            'users' => $users,
            'mahasiswas' => $result
        ]);
    }
    public function delete(){
        $result = DB::statement("truncate mahasiswas");
        $users = User::all();
        $mahasiswas = Mahasiswa::all();
        return redirect()->route('siasmades.pengajuan')->with('pesandua',"Semua data pengajuan berhasil dihapus!");
    }
    public function download(){
        $mahasiswa = new Mahasiswa();
        try {
            Storage::disk('local')->download('public/upload/$mahasiswa->foto');
        } catch (\Exception $e) {
            
        }
    }
}
