<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        \Cache::forget('landing_faqs_data');
        // 1. Intentamos obtener del cache
        $data = \Cache::remember('landing_faqs_data', 60 * 60 * 24, function () {
            $url = "{$this->baseUrl}/faqs-list";
            $client = \Http::timeout(5)->acceptJson();

            if (app()->environment(['local', 'testing'])) {
                $client->withoutVerifying();
            }

            $response = $client->get($url);

            if ($response->successful()) {
                // Extraemos la data limpia de la respuesta de tu API
                return [
                    'faqs'  => $response->json()['data']['faqs'] ?? []
                ];
            }

            return ['faqs' => []];
        });

        // 2. Mandamos las variables por separado para que Blade sea feliz
        return view('faqs.index', [
            'faqs'  => $data['faqs']
        ]);
    }
}
