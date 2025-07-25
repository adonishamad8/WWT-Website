<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Carbon;

class MontyEsimController extends Controller
{
    /**
     * Step 1: Login to Monty API and store the token.
     */
  public function login()
{
    $response = Http::post('https://resellerapi.montyesim.com/api/v0/Agent/login', [
        'username' => 'WorldWide',
        'password' => 'Jx7)Av4(Hp8%',
    ]);

    if ($response->successful()) {
        $tokenData = $response->json();

        if (!isset($tokenData['access_token'])) {
            return response()->json([
                'message' => 'Login response does not contain access_token.',
                'response' => $tokenData,
            ], 400);
        }

        $token = $tokenData['access_token'];

        // Log token after it's assigned
        Log::info('Token after login:', ['token' => $token]);

        // Store token in session
        Session::put('monty_token', $token);
        Session::put('monty_token_expires_at', Carbon::now()->addHour());

        return response()->json([
            'message' => 'Token retrieved and stored successfully.',
            'token' => $token,
        ]);
    } else {
        return response()->json([
            'message' => 'Login failed.',
            'error' => $response->json(),
        ], $response->status());
    }
}

  public function getEsimList()
{
    try {
        $token = Session::get('monty_token'); // Get the stored token from session

        // Make sure the token is available
        if (!$token) {
            return response()->json(['error' => 'Authorization token is missing.'], 401);
        }

        // API call to fetch eSIM list using the token
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('https://resellerapi.montyesim.com/api/v0/Agent/eSIMs');

        // Handle response
        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Failed to fetch eSIMs.', 'details' => $response->json()], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    /**
     * Step 2 & 3: Use the token to fetch agent details (with token check).
     */
    public function getValidToken()
    {
        // Retrieve token from session
        $token = Session::get('monty_token');
        $expiresAt = Session::get('monty_token_expires_at');

        Log::info('Retrieved Token:', ['token' => $token]);
        Log::info('Token Expiry Time:', ['expires_at' => $expiresAt]);

        if (!$token || Carbon::now()->greaterThanOrEqualTo($expiresAt)) {
            Log::info('Token expired or missing. Requesting new token.');

            // Request a new token if expired or missing
            $response = Http::post('https://resellerapi.montyesim.com/api/v0/Agent/login', [
                'username' => 'WorldWide',
                'password' => 'Jx7)Av4(Hp8%',
            ]);

            if ($response->successful()) {
                $tokenData = $response->json();
                Log::info('Received Token from Login API:', ['token' => $tokenData['access_token']]);

                // Store new token in session
                $token = $tokenData['access_token'];
                Session::put('monty_token', $token);
                Session::put('monty_token_expires_at', Carbon::now()->addHour());
            } else {
                Log::error('Login failed. Unable to retrieve new token:', ['response' => $response->json()]);
                return null;
            }
        }

        return $token;
    }
public function getAgentDetails()
{
    try {
        $token = Session::get('monty_token');

        if (!$token) {
            return response()->json(['error' => 'Authorization token is missing.'], 401);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get('https://resellerapi.montyesim.com/api/v0/Agent');

        if ($response->successful()) {
            return response()->json([
                'message' => 'Agent data retrieved successfully.',
                'response' => $response->json(),
            ]);
        } else {
            return response()->json([
                'message' => 'Failed to retrieve agent information.',
                'response' => $response->json(),
            ], $response->status());
        }
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    public function checkToken()
    {
        return response()->json([
            'token' => Session::get('monty_token'),
            'expires_at' => Session::get('monty_token_expires_at'),
        ]);
    }
public function showEsimPlans()
{
    // Get the token stored in session (from /monty/login)
    $token = Session::get('monty_token');

    \Log::info('Using token for bundles:', ['token' => $token]);

    if (!$token) {
        return response()->json(['error' => 'Token missing. Please log in first.'], 401);
    }

    // Make the API request with correct headers
    $response = \Http::withHeaders([
        'Access-Token' => $token,
        'Internal-Token' => $token,
        'Accept' => 'application/json',
    ])->get('https://resellerapi.montyesim.com/api/v0/Bundles', [
        'bundle_category' => 'global',
        'page_size' => 10,
        'reseller_id' => '507f191e810c19729de860ea',
        'currency_code' => 'SAR',
    ]);

    // Handle API response
    if ($response->successful()) {
        $data = $response->json();
        return view('esims.index', ['plans' => $data['bundles'] ?? []]);
    } else {
        return response()->json([
            'error' => 'Failed to fetch bundles',
            'details' => $response->json()
        ], $response->status());
    }
}








}
