<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$email = 'sarslanamjad@gmail.com';
$user = \Illuminate\Support\Facades\DB::table('registration')->where('email', $email)->first();

if ($user) {
    echo "User exists.\n";
    echo "ID: " . $user->id . "\n";
    echo "Email: " . $user->email . "\n";
    echo "Password Hash: " . $user->password . "\n";
    echo "Created At: " . $user->created_at . "\n";
} else {
    echo "User DOES NOT EXIST in registration table.\n";
}

$customer = \Illuminate\Support\Facades\DB::table('customers')->where('email', $email)->first();
if ($customer) {
    echo "Customer exists in customers table.\n";
} else {
    echo "Customer DOES NOT EXIST in customers table.\n";
}
