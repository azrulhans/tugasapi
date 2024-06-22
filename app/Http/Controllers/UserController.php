<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; //hash adalah library yang membantu kita mengenkripsi password
use Illuminate\Support\Facades\Storage; //menyimpan file selayaknya public dan storage menghubungkan ke public
//jika library ini dipanggil, ketika mengambil dari github, harus melakukan proses pengetikan sebegai berikut
// php artisan storage:link, agar storage terhubung ke public 

class UserController extends Controller
{
    //
    public function index()
    {
        // $userAll = User::where('is_active', true)->get();
        $userAll = User::all();
        // $users = User::where('is_active', false)->get();
        return view('admin.user.index', compact('userAll'));
    }

    public function create(){
        $user = User::findOrFail(Auth::id());
        $pengguna = User::all()->unique('hak_akses');
        return view('admin.pengguna.create', compact('pengguna','user'));
    }

    public function pengguna(){
        $userAll = User::where('is_active', true)->get();
        return view('admin.pengguna.index', compact('userAll'));
    }
    public function activate(User $user)
    {
        $user->is_active = true;
        $user->save();

        return redirect('admin/user')->with('success', 'User Berhasil diaktifkan');
    }

    public function showProfile()
    {
        $user = User::findOrFail(Auth::id());
        return view('front.profile', compact('user'));
    }

    public function showProfileAdmin()
    {
        $user = User::findOrFail(Auth::id());
        return view('admin.user.profile', compact('user'));
    }

    public function editProfile(Request $request){
        $id          = $request->id;
        $name        = $request->name;
        $fullname    = $request->fullname;
        $email       = $request->email;
        $no_hp       = $request->no_hp;
        $alamat      = $request->alamat;

        $dataBaru = [
            "name"      => $name,
            "email"     => $email,
            "email"     => $email,
            "fullname"  => $fullname,
            "no_hp"     => $no_hp,
            "alamat"    => $alamat,
        ];

        $userModel = new User();

        if(!$userModel->where("id", $id)->update($dataBaru)){
            return redirect('profile')->with([
                "error" => "Data Gagal Di Update"
            ]);
        }

        return redirect('profile')->with([
            "success" => "Data Berhasil Di Update"
        ]);
    }

    public function update(Request $request, $id)
    {
        //validate 
        request()->validate([
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|unique:users,email, ' . $id . ',id',
            'old_password' => 'nullable|string',
            'password' => 'nullable|required_with:old_password|string|confirmed|min:6'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('old_password')) {
            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                return back()
                    ->withErrors(['old_password' => __('Tolong periksa passwordnya lagi')])
                    ->withInput();
            }
        }
        if (request()->hasFile('foto')) {
            //kodingan dibawah ini untuk pengecekan apakah foto sudah ada atau belum
            if ($user->foto && file_exists(storage_path('app/public/fotos/' . $user->foto))) {
                Storage::delete('app/public/fotos' . $user->foto);
            }
            //proses requst foto setelah dicek
            $file = $request->file('foto');
            $fileName = 'foto-' . uniqid() . $file->getClientOriginalName();
            //pengecekan ekstension, dia sebagai .png .jpg. jpeg dan seterusnya 
            // $fileName = '.'. $file->getClientOriginalExtension();
            //dimasukan ke file storagenya 
            $request->foto->move(storage_path('app/public/fotos/'), $fileName);
            //request menggunakan eloquent
            $user->foto = $fileName;
        }
        $user->role = $request->role;
        $user->save();
        return back()->with('success', 'Profile Terupdate');
    }
}