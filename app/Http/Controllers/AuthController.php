<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $ip = $request->ip();

        $user = DB::select('SELECT * FROM sau.f_login(?, ?, ?)', [$username, $password, $ip]);
        
        if (!empty($user)) {
            $userData = $user[0];

            // ✅ GUARDAR DATOS EN SESIÓN
            session([
                'authenticated' => true,
                'user_id' => $userData->r_id_postulante ?? null,
                'username' => $username,
                'nro_dip' => $userData->r_nro_dip ?? null,
                'fec_nac' => $password,
                'user_name' => $userData->r_nombres_apellidos ?? null,
                'user_career' => $userData->r_programa ?? null,
                'user_id_post' => $userData->r_id_examen_postulante ?? null,
                'user_time' => $userData->r_timpo_restante ?? null,
                'user_status' => $userData->r_estado ?? null,
                'user_data' => $userData
            ]);

            // Redirigir a la vista con los datos (manteniendo tu flujo actual)
            return view('exams.info', [
                'user_ci' => $userData->r_nro_dip ?? null,
                'user_name' => $userData->r_nombres_apellidos ?? null,
                'user_career' => $userData->r_programa ?? null,
                'user_id_post' => $userData->r_id_examen_postulante ?? null,
                'user_time' => $userData->r_timpo_restante ?? null,
                'user_status' => $userData->r_estado ?? null,
            ]);

        } else {
            return redirect()->back()->with('error', 'Credenciales inválidas');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
