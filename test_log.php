<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

try {
    $log = App\Models\LoginSecurityLog::create([
        'user_id' => 6, // sarslanamjad ID
        'ip_address' => '127.0.0.1',
        'attempt_count' => 1,
        'is_successful' => 1,
        'user_agent' => 'Test',
        'logged_at' => now()
    ]);
    echo "Success log created!\n";
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
