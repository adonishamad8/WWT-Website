<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class MontyEsimController extends Controller
{
    public function login()
    {
        $response = Http::post('https://resellerapi.montyesim.com/api/v0/Agent/login/Access-Token', [
            'username' => 'WorldWide',
            'password' => 'Jx7)Av4(Hp8%',
        ]);

        $data = $response->json();

        if ($response->ok() && isset($data['access_token'])) {
            Session::put('monty_token', $data['access_token']);
            return response()->json(['message' => 'Token stored', 'token' => $data['access_token']]);
        } else {
            return response()->json(['message' => 'Login failed', 'error' => $data], 401);
        }
    }

    public function getProducts()
    {
        $token = Session::get('monty_token');

        if (!$token) {
            return response()->json(['error' => 'No token found. Please login first.'], 403);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('https://resellerapi.montyesim.com/api/v0/products');

        return $response->json();
    }
    public function checkToken()
{
    $token = Session::get('monty_token');
    return response()->json(['token' => $token]);
}

}
