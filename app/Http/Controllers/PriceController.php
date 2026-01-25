<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceController extends Controller
{
    public function index()
    {
        $plans = [
            [
                'name' => 'Básico',
                'slug' => 'plan_basico_01',
                'price' => 199.00,
                'limit_users' => 1,
                'has_custom_domain' => false,
                'is_recommended' => false,
                'features' => [
                    'Expediente NOM-024 Básico',
                    'Agenda y Citas (hasta 200/mes)',
                    'Recordatorios por Email',
                    'Soporte por Chat'
                ]
            ],
            [
                'name' => 'Consultorio',
                'slug' => 'plan_consultorio_01',
                'price' => 499.00,
                'limit_users' => 3,
                'has_custom_domain' => false,
                'is_recommended' => false,
                'features' => [
                    'Expediente NOM-024 Completo',
                    'Agenda y Citas Ilimitadas',
                    'Recordatorios SMS + Email',
                    'Telemedicina Básica',
                    'Firma Electrónica Simple'
                ]
            ],
            [
                'name' => 'Clínica Pro',
                'slug' => 'plan_clinica_pro_01',
                'price' => 1299.00,
                'limit_users' => 10,
                'has_custom_domain' => true,
                'is_recommended' => true,
                'features' => [
                    'HL7 / FHIR Integrado',
                    'Facturación CFDI 4.0 Completa',
                    'Telemedicina Avanzada',
                    'Control de Inventario y Farmacia',
                    'Reportes Analíticos + Dashboards'
                ]
            ],
            [
                'name' => 'Hospital',
                'slug' => 'plan_hospital_01',
                'price' => 2499.00,
                'limit_users' => 999, // Ilimitados
                'has_custom_domain' => true,
                'is_recommended' => false,
                'features' => [
                    'Médicos y Usuarios Ilimitados',
                    'API de Integración Avanzada',
                    'Gestión Multi-Sucursal',
                    'Integración con Dispositivos Médicos',
                    'Soporte 24/7 Dedicado'
                ]
            ],
        ];

        return view('pricing.index', compact('plans'));
    }
}
