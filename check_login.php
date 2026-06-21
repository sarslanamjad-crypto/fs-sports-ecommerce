<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'sarslanamjad@gmail.com';
$user = \Illuminate\Support\Facades\DB::table('registration')->where('email', $email)->first();

echo "Checking if we can find by exact hash...\n";
$loginUser = App\Models\Registration::where('email', $email)
    ->where('password', $user->password)
    ->first();

if ($loginUser) {
    echo "Found user in DB using Eloquent! ID: " . $loginUser->id . "\n";
} else {
    echo "Could not find user via Eloquent.\n";
}
