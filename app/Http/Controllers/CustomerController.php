<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CustomerController extends Controller
{
  

    public function showRegistrationForm()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:customers',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat entitas pelanggan baru
        $customer = new User();
        $customer->name = $request->input('name');
        $customer->username = $request->input('username');
        $customer->email = $request->input('email');
        $customer->password = bcrypt($request->input('password'));
        $customer->save();

        // Login pelanggan setelah registrasi
        Auth::login($customer);

        return redirect()->route('login'); // Gantilah dengan URL yang sesuai
    }

    public function showLoginForm()
    {
        return view('login');
    }
    
//     public function login(Request $request)
//     {
//         // $credentials = $request->only('username', 'password');

//         // $username = $credentials['username'];
//         // $password = $credentials['password'];
    
//         // $user = Customer::where('username', $username)->first();
    
//         // if (!$user) {
            
//         //     return dd("Username tidak ditemukan.");
//         // }
    
        
//         // if (password_verify($password, $user->password)) {
           
//         //     Auth::login($user);
    
//         //     return redirect()->route('index'); 
//         // } else {
            
//         //     return dd("Kredensial tidak valid. Coba lagi.");
//         // }

// }

public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
{
    Auth::logout();

    return redirect()->route('index');
}
}
