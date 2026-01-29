<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class PriceController extends Controller
{
    public function index()
    {
        // 1. Intentamos obtener del cache
        $data = \Cache::remember('landing_pricing_data', 60 * 60 * 24, function () {
            $url = 'https://api.medical.test/v1/plans-list';
            $client = \Http::timeout(5)->acceptJson();

            if (app()->environment(['local', 'testing'])) {
                $client->withoutVerifying();
            }

            $response = $client->get($url);

            if ($response->successful()) {
                // Extraemos la data limpia de la respuesta de tu API
                return [
                    'plans' => $response->json()['data']['plans'] ?? [],
                    'faqs'  => $response->json()['data']['faqs'] ?? []
                ];
            }

            return ['plans' => [], 'faqs' => []];
        });

        // 2. Mandamos las variables por separado para que Blade sea feliz
        return view('pricing.index', [
            'plans' => $data['plans'],
            'faqs'  => $data['faqs']
        ]);
    }
}
