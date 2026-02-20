<?php

namespace TechContributors\LogPulse\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;

class LogPulseViewerController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::timeout(5)
            ->withHeaders([
                'x-api-key' => config('log-pulse.api_key'),
            ])
            ->get(config('log-pulse.endpoint'), [
                'page' => $request->get('page', 1),
                'limit' => 15,
                'order' => $request->get('order', 'desc'),
            ])
            ->throw();

        $json = $response->json();

        return view('log-pulse::logs.index', [
            'logs' => $json['data'] ?? [],
            'pagination' => $json['pagination'] ?? [],
        ]);
    }
}