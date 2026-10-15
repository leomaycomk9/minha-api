<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
       return view('users.index',['users'=> $users]);

    }

    public function showRegister(){
        return view('users.register');
    }
    public function register(Request $request){
    
    $data = $request->validate([
    'name' => 'required|string|min:3|max:255',
    'email' => 'required|email|unique:users,email',
    'password' => 'required',
    ]);
    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);
    return redirect()->route('login');
    
    }

    public function login(){
        return view('users.login');
    }

    public function authentication(Request $request)
    {
        
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        ]);
        
        if(Auth::attempt($credentials)){
            
        $request->session()->regenerate();

        return redirect()->route('products.index');
        }
        return back();
    }

    public function show(User $user){
        if(empty($user)){
            return "usuário nao encontrado";
        }else{
        dd($user);
        }
    }
}

