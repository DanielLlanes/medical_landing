<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{
    public function index()
    {
        \Cache::forget('landing_plans');
        $url = 'https://api.medical.test/v1/plans-list';

        // Cacheamos los planes por 24 horas para evitar peticiones HTTP innecesarias
        $plans = \Cache::remember('landing_plans', 60 * 60 * 24, function () use ($url) {
            try {
                // 1. Creamos la instancia del cliente HTTP con un timeout
                $client = Http::timeout(5)->acceptJson();

                // 2. Condición de seguridad para entornos locales (.test)
                if (app()->environment(['local', 'testing'])) {
                    $client->withoutVerifying();
                }

                // 3. Ejecutamos la petición
                $response = $client->get($url);

                if ($response->successful()) {
                    return $response->json()['data'] ?? [];
                }

                // Si la respuesta no es 200, logeamos el error y devolvemos vacío
                \Log::warning('API Plans respondió con error', [
                    'status' => $response->status(),
                    'body' => $response->body()
                ]);

                return [];

            } catch (\Throwable $e) {
                \Log::error('Fallo crítico conexión API Plans: ' . $e->getMessage());
                return [];
            }
        });

        return view('pricing.index', compact('plans'));
    }
}
