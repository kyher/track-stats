<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tracks = [
            "ALBERT PARK",
            "SHANGHAI INTERNATIONAL CIRCUIT",
            "SUZUKA CIRCUIT",
            "BAHRAIN INTERNATIONAL CIRCUIT",
            "JEDDAH STREET CIRCUIT",
            "MIAMI INTERNATIONAL AUTODROME",
            "AUTODROMO ENZO E DINO FERRARI",
            "CIRCUIT DE MONACO",
            "CIRCUIT DE CATALUNYA",
            "CIRCUIT GILLES VILLENEUVE",
            "RED BULL RING",
            "CIRCUIT SILVERSTONE",
            "SPA-FRANCORCHAMPS",
            "HUNGARORING",
            "CIRCUIT ZANDVOORT",
            "AUTODROMO NAZIONALE MONZA",
            "BAKU CITY CIRCUIT",
            "MARINA BAY STREET CIRCUIT",
            "CIRCUIT OF THE AMERICAS",
            "AUTODROMO HERMANOS RODRIGUEZ",
            "AUTODROMO JOSE CARLOS PACE INTERLAGOS",
            "LAS VEGAS STREET CIRCUIT",
            "LOSAIL INTERNATIONAL CIRCUIT",
            "YAS MARINA CIRCUIT"
        ];

        foreach ($tracks as $trackName) {
            Track::create(['name' => $trackName]);
        }
    }
}
