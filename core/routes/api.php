<?php

use App\Http\Controllers\MontyEsimController;

Route::get('agent/details', [MontyEsimController::class, 'getAgentDetails']);
Route::get('check/token', [MontyEsimController::class, 'checkToken']);
Route::get('esim/list', [MontyEsimController::class, 'getEsimList']);
Route::get('login', [MontyEsimController::class, 'login']);
