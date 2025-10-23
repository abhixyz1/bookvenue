<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        // 1) Akun demo
        if (!User::where('email', 'admin@bookvenue.test')->exists()) {
            User::create([
                'name'     => 'Admin',
                'email'    => 'admin@bookvenue.test',
                'password' => Hash::make('password'),
                'role'     => 'admin',
            ]);
        }

        if (!User::where('email', 'user1@bookvenue.test')->exists()) {
            User::create([
                'name'     => 'User One',
                'email'    => 'user1@bookvenue.test',
                'password' => Hash::make('password'),
                'role'     => 'user',
            ]);
        }

        // 2) Buat 5 lantai (1..5) jika belum ada
        for ($n = 1; $n <= 5; $n++) {
            $floor = Floor::firstOrCreate(['number' => $n]);

            // 3) Tiap lantai, buat 6 ruang dengan pola konsisten
            for ($i = 1; $i <= 6; $i++) {
                $name = sprintf('Ruang %d0%d', $n, $i); // ex: Ruang 101, 102, dst

                Room::firstOrCreate(
                    ['floor_id' => $floor->id, 'name' => $name],
                    [
                        'capacity'   => [20, 40, 60, 100, 150, 200][($i - 1) % 6],
                        'type'       => ['meeting','meeting','hall','hall','auditorium','lab'][($i - 1) % 6],
                        'facilities' => ['ac','projector','sound','wifi'],
                        'price_hour' => [50000, 75000, 100000, 150000, 200000, 250000][($i - 1) % 6],
                        'price_day'  => [300000, 400000, 600000, 900000, 1200000, 1800000][($i - 1) % 6],
                    ]
                );
            }
        }
    }
}
