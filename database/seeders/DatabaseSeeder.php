<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('ads')->insert([
            'id' => 1,
            'typology' => 'CHALET',
            'description' => 'Este piso es una ganga, compra, compra, COMPRA!!!!!',
            'pictures' => json_encode([]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 2,
            'typology' => 'FLAT',
            'description' => 'Nuevo ático céntrico recién reformado. No deje pasar la oportunidad y adquiera este ático de lujo',
            'pictures' => json_encode([4]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 3,
            'typology' => 'CHALET',
            'description' => '',
            'pictures' => json_encode([2]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 4,
            'typology' => 'FLAT',
            'description' => 'Ático céntrico muy luminoso y recién reformado, parece nuevo',
            'pictures' => json_encode([5]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 5,
            'typology' => 'FLAT',
            'description' => 'Pisazo',
            'pictures' => json_encode([3, 8]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 6,
            'typology' => 'GARAGE',
            'description' => '',
            'pictures' => json_encode([6]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 7,
            'typology' => 'GARAGE',
            'description' => 'Garaje en el centro de Albacete',
            'pictures' => json_encode([]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('ads')->insert([
            'id' => 8,
            'typology' => 'CHALET',
            'description' => 'Maravilloso chalet situado en lAs afueras de un pequeño pueblo rural. El entorno es espectacular, las vistas magníficas. ¡Cómprelo ahora!',
            'pictures' => json_encode([1, 7]),
            'houseSize' => 300,
            'gardenSize' => null,
            'score' => null,
            'irrelevantSince' => null
        ]);

        DB::table('pictures')->insert([
            'id' => 1,
            'url' => 'https://www.idealista.com/pictures/1',
            'quality' => 'SD'
        ]);

        DB::table('pictures')->insert([
            'id' => 2,
            'url' => 'https://www.idealista.com/pictures/2',
            'quality' => 'HD'
        ]);

        DB::table('pictures')->insert([
            'id' => 3,
            'url' => 'https://www.idealista.com/pictures/3',
            'quality' => 'SD'
        ]);

        DB::table('pictures')->insert([
            'id' => 4,
            'url' => 'https://www.idealista.com/pictures/4',
            'quality' => 'HD'
        ]);

        DB::table('pictures')->insert([
            'id' => 5,
            'url' => 'https://www.idealista.com/pictures/5',
            'quality' => 'SD'
        ]);

        DB::table('pictures')->insert([
            'id' => 6,
            'url' => 'https://www.idealista.com/pictures/6',
            'quality' => 'SD'
        ]);

        DB::table('pictures')->insert([
            'id' => 7,
            'url' => 'https://www.idealista.com/pictures/7',
            'quality' => 'SD'
        ]);

        DB::table('pictures')->insert([
            'id' => 8,
            'url' => 'https://www.idealista.com/pictures/8',
            'quality' => 'HD'
        ]);
    }
}
