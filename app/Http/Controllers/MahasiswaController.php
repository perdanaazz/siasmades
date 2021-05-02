<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Validator;
use App\Models\User;

class MahasiswaController extends Controller
{
    public function home(){
        return view('mahasiswa.home');
    }
    public function index(){
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index',['mahasiswas' => $mahasiswas]);
    }

    public function create(){
        return view('mahasiswa.create');
    }
    public function store(Request $request){
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'foto' => 'required|file|image|max:1000',
            'alamat' => '',
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
        $mahasiswa->nim = $validateData['nim'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->jurusan = $validateData['jurusan'];
        $mahasiswa->alamat = $validateData['alamat'];
        $file = $validateData['foto'];
        $extension = $file->getClientOriginalExtension();
        $filename = 'mhs-'.time() . '.' . $extension;
        $file->move(public_path().'/img',$filename);
        $mahasiswa->foto = $filename;
        // if($request->hasFile('foto')){
        //     $file = $validateData['foto'];
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = 'mhs-'.time() . '.' . $extension;
        //     $file->move(public_path().'/img',$filename);
        //     $mahasiswa->foto = $filename;
        // }else{
        //     return $request;
        //     $mahasiswa->foto = '';
        // }
        $mahasiswa->save();

        // Mahasiswa::create($validateData);
        return redirect()->route('mahasiswas.index')->with('pesan',"Penambahan data {$validateData['nama']} berhasil");
    }
    public function show(Mahasiswa $mahasiswa){
        //$result = Mahasiswa::findOrFail($mahasiswa);
        return view('mahasiswa.show',['mahasiswa'=>$mahasiswa]);
    }
    public function edit(Mahasiswa $mahasiswa){
        return view('mahasiswa.edit',['mahasiswa'=>$mahasiswa]);
    }
    public function update(Request $request, Mahasiswa $mahasiswa){
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas,nim,'.$mahasiswa->id,
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => 'required',
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

        // Mahasiswa::where('id',$mahasiswa->id)->update($validateData);
        $mahasiswa->nim = $validateData['nim'];
        $mahasiswa->nama = $validateData['nama'];
        $mahasiswa->jenis_kelamin = $validateData['jenis_kelamin'];
        $mahasiswa->jurusan = $validateData['jurusan'];
        $mahasiswa->alamat = $validateData['alamat'];
        if($request->hasFile('foto')){
            $validateData = $request->validate([
                'foto' => 'required|file|image|max:1000',
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
        return redirect()->route('mahasiswas.show',['mahasiswa'=>$mahasiswa->id])->with('pesan',"Update data {$request->nama} berhasil");
    }
    public function destroy(Mahasiswa $mahasiswa){
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('pesan',"Hapus data $mahasiswa->nama berhasil");
    }
    public function delete(){
        $mahasiswa = Mahasiswa::all()->delete();
        return redirect()->route('mahasiswas.index');
    }
    public function sortynim(){
        $result = Mahasiswa::orderBy('nim', 'asc')->get();
        return view('mahasiswa.index',['mahasiswas'=>$result]);
    }
    public function sortynama(){
        $result = Mahasiswa::orderBy('nama', 'asc')->get();
        return view('mahasiswa.index',['mahasiswas'=>$result]);
    }
}
