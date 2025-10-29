<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

echo "=== Checking Users ===" . PHP_EOL;
echo "Total users: " . User::count() . PHP_EOL . PHP_EOL;

$admin = User::where('email', 'admin@bookvenue.test')->first();
if ($admin) {
    echo "Admin found:" . PHP_EOL;
    echo "  Email: " . $admin->email . PHP_EOL;
    echo "  Role: " . $admin->role . PHP_EOL;
    echo "  Password hash: " . $admin->password . PHP_EOL;
    echo "  Password check (password): " . (Hash::check('password', $admin->password) ? 'VALID' : 'INVALID') . PHP_EOL;
} else {
    echo "Admin NOT FOUND!" . PHP_EOL;
}

echo PHP_EOL;

$user = User::where('email', 'user1@bookvenue.test')->first();
if ($user) {
    echo "User1 found:" . PHP_EOL;
    echo "  Email: " . $user->email . PHP_EOL;
    echo "  Role: " . $user->role . PHP_EOL;
    echo "  Password check (password): " . (Hash::check('password', $user->password) ? 'VALID' : 'INVALID') . PHP_EOL;
} else {
    echo "User1 NOT FOUND!" . PHP_EOL;
}
