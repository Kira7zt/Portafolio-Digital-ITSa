<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Contracts\Factory as SocialiteFactory;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    /**
     * Redirigir al usuario a la página de autenticación de Google
     */
    public function redirect()
    {
        return Socialite::driver('google')
            ->redirect();
    }

    /**
     * Manejar el callback de Google
     */
    public function callback(Request $request)
{
    try {
        // Log para debug
        Log::info('Iniciando callback de Google');
        
        // Obtener datos del usuario desde Google
        $userGoogle = Socialite::driver('google')->user();

        Log::info('Usuario de Google obtenido', ['email' => $userGoogle->email]);

        if (!$userGoogle || !$userGoogle->email) {
            Log::error('No se pudo obtener email del usuario de Google');
            return redirect('/login')->with('error', 'No se pudieron obtener los datos del usuario de Google.');
        }

        $fecha = Carbon::now();

        // Buscar si el usuario ya existe
        $user = User::where('email', $userGoogle->email)->first();

        if ($user) {
            Log::info('Usuario existente encontrado', ['user_id' => $user->id]);
            // Actualizar token y verificar email
            $user->update([
                'google_id' => $userGoogle->id,
                'google_token' => $userGoogle->token ?? null,
                'email_verified_at' => $fecha,
            ]);
        } else {
            Log::info('Creando nuevo usuario');
            // Crear nuevo usuario
            $user = User::create([
                'name' => $userGoogle->name,
                'email' => $userGoogle->email,
                'google_id' => $userGoogle->id,
                'google_token' => $userGoogle->token ?? null,
                'email_verified_at' => $fecha,
                'password' => Hash::make(uniqid()),
            ]);
            Log::info('Usuario creado exitosamente', ['user_id' => $user->id]);
        }

        // Iniciar sesión
        Auth::login($user);
        Log::info('Usuario logueado', ['user_id' => $user->id]);

        // Si el usuario aún no definió su género, lo mandamos a completarlo
        if (is_null($user->genero)) {
            Log::info('Usuario sin género, redirigiendo a completar perfil');
            return redirect()->route('completar.genero');
        }

        Log::info('Usuario con género, redirigiendo a admin');
        // Si ya tiene género, va directo al panel principal
        return redirect('/admin')->with('success', 'Sesión iniciada correctamente con Google.');

    } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
        Log::error('InvalidStateException capturada', ['error' => $e->getMessage()]);
        return $this->handleInvalidStateException($request);
        
    } catch (Exception $e) {
        Log::error('Error en callback de Google', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);
        return redirect('/login')->with('error', 'Error de autenticación. Intenta más tarde.');
    }
}

    /**
     * Manejar InvalidStateException con método stateless
     */
    private function handleInvalidStateException(Request $request) 
    {
        try {
            if (!$request->has('code')) {
                return redirect('/register')->with('error', 'Error de autenticación. Por favor, intenta nuevamente.');
            }
            $userGoogle = app(SocialiteFactory::class)->driver('google')->stateless()->user();
            
            if (!$userGoogle || !$userGoogle->email) {
                return redirect('/register')->with('error', 'No se pudieron obtener los datos del usuario.');
            }

            $fecha = Carbon::now();
            
            $user = User::where('email', $userGoogle->email)->first();
            
            if ($user) {
                $user->update([
                    'google_id' => $userGoogle->id,
                    'google_token' => $userGoogle->token ?? null,
                    'email_verified_at' => $fecha,
                ]);
            } else {
                $user = User::create([
                    'name' => $userGoogle->name,
                    'email' => $userGoogle->email,
                    'google_id' => $userGoogle->id,
                    'google_token' => $userGoogle->token ?? null,
                    'email_verified_at' => $fecha,
                    'password' => Hash::make(uniqid()),
                ]);
            }

            Auth::login($user);

            // Si el usuario no tiene género, lo enviamos al formulario
            if (is_null($user->genero)) { // CAMBIO: cambiado empty() por is_null()
                return redirect()->route('completar.genero');
            }

            // Si ya tiene género, va directo al admin
            return redirect('/admin')->with('success', 'Sesión iniciada correctamente con Google.');

        } catch (Exception $e) {
            Log::error('Error en callback stateless: ' . $e->getMessage());
            return redirect('/register')->with('error', 'Error de autenticación. Intenta más tarde.');
        }
    }

    /**
     * Mostrar formulario para completar género
     */
    public function mostrarFormularioGenero()
    {
        // Verificar que el usuario esté autenticado
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Debes iniciar sesión primero.');
        }

        return view('auth.completar-genero');
    }

    /**
     * Guardar género del usuario
     */
    public function guardarGenero(Request $request)
    {
        $request->validate([
            'genero' => 'required|in:masculino,femenino', // CAMBIO: minúsculas para consistencia
        ], [
            'genero.required' => 'Debe seleccionar un género',
            'genero.in' => 'Género inválido',
        ]);

        $user = User::find(Auth::id());
        
        if (!$user) {
            return redirect('/login')->with('error', 'Usuario no encontrado.');
        }

        $user->genero = $request->genero;
        $user->save();

        return redirect('/admin')->with('success', 'Información completada correctamente.');
    }
}