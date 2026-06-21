<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'test' . time() . '@example.com';
$password = 'password123';

$user = App\Models\Registration::create([
    'first_name' => 'Test',
    'last_name' => 'User',
    'email' => $email,
    'password' => md5($password)
]);

$dbUser = \Illuminate\Support\Facades\DB::table('registration')->where('email', $email)->first();

echo "Raw password sent to DB: " . md5($password) . "\n";
echo "Password stored in DB: " . $dbUser->password . "\n";

$loginCheck = App\Models\Registration::where('email', $email)
    ->where('password', md5($password))
    ->first();

if ($loginCheck) {
    echo "Login check PASSED.\n";
} else {
    echo "Login check FAILED.\n";
}
