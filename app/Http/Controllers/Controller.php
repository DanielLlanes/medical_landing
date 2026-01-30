<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.medical_api.url');
    }
}
