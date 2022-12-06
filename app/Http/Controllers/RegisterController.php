<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(Request $request){
       $validateData = $request->validate([
        'username'=>'required',
        'email' => 'required',
        'password' => 'required',
       ]);

       $validateData['password'] = bcrypt($validateData['password']);

       User::create($validateData);

       return redirect('/login')->with('berhasil', 'berhasil membuat akun', 'silahkan login!');
    }
}
