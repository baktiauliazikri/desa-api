<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Models\Village;

class DesaSeeder extends Seeder
{
    public function run()
    {
        $villages = Village::all();
        foreach ($villages as $village) {
            \App\Models\Desa::create([
                'name' => $village->name
            ]);
        }
    }
}
