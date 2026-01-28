<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $url = 'https://api.medical.test/landlord/tenants';

        // Obtenemos los datos validados + la confirmación
        $data = array_merge($request->validated(), [
            'password_confirmation' => $request->password_confirmation
        ]);

        // 1. Preparamos el cliente HTTP
        $client = Http::withHeaders([
            'Accept' => 'application/json',
        ])->timeout(10); // Un poco más de tiempo porque crear DBs es pesado

        // 2. Condición de seguridad según el entorno
        if (app()->environment(['local', 'testing'])) {
            $client->withoutVerifying();
        }

        // 3. Ejecutamos la petición POST
        $response = $client->post($url, $data);

        if ($response->successful()) {
            // Limpiamos la cache de la landing si fuera necesario,
            // aunque aquí no afecta a los planes, es buena práctica tenerlo en cuenta.
            return back()->with('registered', true);
        }

        // 4. Manejo de errores de la API
        $errors = $response->json()['errors'] ?? ['error' => 'No se pudo procesar el registro en el servidor médico.'];

        return back()->withErrors($errors)->withInput();
    }
}
