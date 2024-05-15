<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('user.index',["title"=>"Data User","data"=>user::all() ]);
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            "name"=>"required",
            "email"=>"required",
            "password"=>"required"
        ]);
        $password=Hash::make($request->password);
        $request->merge(["password"=>$password]);

        user::create($request->all());
        return redirect()->route('pengguna.index')->with('success','Data Berhasil Ditambah');
    }
}
