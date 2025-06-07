<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk test Octane
Route::get('/test-octane', function () {
    return response()->json([
        'message' => 'Halo! Laravel Octane dengan FrankenPHP berhasil jalan!',
        'server' => 'FrankenPHP',
        'php_version' => PHP_VERSION,
        'laravel_version' => app()->version(),
        'timestamp' => now()->format('Y-m-d H:i:s'),
        'memory_usage' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
    ]);
});

// Route untuk test performa
Route::get('/test-performance', function () {
    $start = microtime(true);
    
    // Simulasi kerja berat: buat 1000 array
    $data = [];
    for ($i = 0; $i < 1000; $i++) {
        $data[] = [
            'id' => $i,
            'name' => 'User ' . $i,
            'email' => 'user' . $i . '@example.com',
            'created_at' => now(),
        ];
    }
    
    $end = microtime(true);
    $executionTime = ($end - $start) * 1000; // Convert ke milliseconds
    
    return response()->json([
        'message' => 'Test performance selesai!',
        'data_generated' => count($data),
        'execution_time' => round($executionTime, 2) . ' ms',
        'memory_used' => round(memory_get_usage() / 1024 / 1024, 2) . ' MB',
    ]);
});