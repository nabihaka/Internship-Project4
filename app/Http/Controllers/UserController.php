<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Library untuk melakukan hash pada password

class UserController extends Controller
{
    // Method untuk memuat semua pengguna dari database dan menampilkan di halaman 'users'
    public function loadAllUsers(){
        // Mengambil semua data pengguna
        $all_users = User::all();
        // Mengembalikan view 'users' dengan data pengguna
        return view('users', compact('all_users'));
    }

    // Method untuk memuat formulir penambahan pengguna
    public function loadAddUserForm(){
        // Mengembalikan view 'add-user'
        return view('add-user');
    }

    // Method untuk menambahkan pengguna baru
    public function AddUser(Request $request){
        // Validasi data dari request
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
            'password' => 'required|confirmed|min:4|max:8',
        ]);

        try {
            // Membuat instansi baru dari model User
            $new_user = new User;
            // Mengisi atribut pengguna dengan data dari request
            $new_user->name = $request->full_name;
            $new_user->email = $request->email;
            $new_user->phone_number = $request->phone_number;
            $new_user->password = Hash::make($request->password); // Mengenkripsi password
            // Menyimpan pengguna baru ke database
            $new_user->save();

            // Redirect ke halaman pengguna dengan pesan sukses
            return redirect('/users')->with('success', 'User Added Successfully');
        } catch (\Exception $e) {
            // Redirect ke formulir penambahan dengan pesan gagal jika terjadi error
            return redirect('/add/user')->with('fail', $e->getMessage());
        }
    }

    // Method untuk mengedit pengguna yang sudah ada
    public function EditUser(Request $request){
        // Validasi data dari request
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required',
        ]);

        try {
            // Mengupdate data pengguna berdasarkan ID
            $update_user = User::where('id', $request->user_id)->update([
               'name' => $request->full_name,
               'email' => $request->email,
               'phone_number' => $request->phone_number,
            ]);

            // Redirect ke halaman pengguna dengan pesan sukses
            return redirect('/users')->with('success', 'User Updated Successfully');
        } catch (\Exception $e) {
            // Redirect ke formulir edit dengan pesan gagal jika terjadi error
            return redirect('/edit/user')->with('fail', $e->getMessage());
        }
    }

    // Method untuk memuat formulir edit pengguna berdasarkan ID
    public function loadEditForm($id){
        // Mengambil data pengguna berdasarkan ID
        $user = User::find($id);
        // Mengembalikan view 'edit-user' dengan data pengguna
        return view('edit-user', compact('user'));
    }

    // Method untuk menghapus pengguna berdasarkan ID
    public function deleteUser($id){
        try {
            // Menghapus pengguna dari database berdasarkan ID
            User::where('id', $id)->delete();
            // Redirect ke halaman pengguna dengan pesan sukses
            return redirect('/users')->with('success', 'User Deleted Successfully');
        } catch (\Exception $e) {
            // Redirect ke halaman pengguna dengan pesan gagal jika terjadi error
            return redirect('/users')->with('fail', $e->getMessage());
        }
    }
}