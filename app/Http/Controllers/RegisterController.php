<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        // Obtenemos los datos validados + la confirmación que la API exige
        $data = array_merge($request->validated(), [
            'password_confirmation' => $request->password_confirmation
        ]);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])
        ->withoutVerifying()
        ->post('https://api.medical.test/landlord/tenants', $data); // Enviamos $data, no validated()

        // Para la prueba final, quitemos el dd y veamos el éxito
        if ($response->successful()) {
            return back()->with('registered', true);
        }

        return back()->withErrors($response->json()['errors'] ?? ['error' => 'Error en API'])->withInput();
    }
}
