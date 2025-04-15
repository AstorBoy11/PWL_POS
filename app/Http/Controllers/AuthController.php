<?php  
namespace App\Http\Controllers; 
 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth; 
 
class AuthController extends Controller 
{ 
    public function login() 
    { 
        // Jika user sudah login, redirect ke home/dashboard
        if (Auth::check()) {  
            return redirect('/'); 
        } 
        return view('auth.login'); 
    }  

    public function postlogin(Request $request) 
    { 
        // Jika request datang dari AJAX atau ingin JSON
        if ($request->ajax() || $request->wantsJson()) { 
            $credentials = $request->only('username', 'password'); 
            
            if (Auth::attempt($credentials)) {                 
                return response()->json([ 
                    'status' => true, 
                    'message' => 'Login Berhasil', 
                    'redirect' => url('/') 
                ]); 
            }              

            // ✅ PERUBAHAN DI SINI:
            // Menambahkan "msgField" agar bisa ditangkap oleh jQuery dan tampilkan error di bawah input
            return response()->json([ 
                'status' => false, 
                'message' => 'Username atau password salah',
                'msgField' => [
                    'username' => ['Username atau password salah.'],
                    'password' => ['Username atau password salah.']
                ]
            ]); 
        } 
 
        // Jika bukan AJAX, redirect ke login biasa
        return redirect('login'); 
    }  

    public function logout(Request $request) 
    { 
        Auth::logout(); 
 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 
        
        return redirect('login'); 
    } 
}
