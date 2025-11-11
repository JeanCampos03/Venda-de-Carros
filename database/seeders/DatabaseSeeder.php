<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Carro;
use App\Models\Cor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // cria ou atualiza o admin
        User::updateOrCreate(
            ['email' => 'admin@site.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'is_admin' => true,
            ]
        );

        // criar 
        $ferrari = Marca::firstOrCreate(['nome' => 'Ferrari']);
        $subaru = Marca::firstOrCreate(['nome' => 'Subaru']);
        $cadillac = Marca::firstOrCreate(['nome' => 'Cadillac']);

        // ======== MODELOS ========
        $sf90 = Modelo::firstOrCreate(['nome' => 'SF90', 'marca_id' => $ferrari->id]);
        $wrx = Modelo::firstOrCreate(['nome' => 'WRX STI', 'marca_id' => $subaru->id]);
        $escalade = Modelo::firstOrCreate(['nome' => 'Escalade', 'marca_id' => $cadillac->id]);

        // ======== CORES ========
        $vermelho = Cor::firstOrCreate(['nome' => 'Vermelho']);
        $azul = Cor::firstOrCreate(['nome' => 'Azul']);
        $preto = Cor::firstOrCreate(['nome' => 'Preto']);

        // ======== CARROS ========
        Carro::firstOrCreate([
            'modelo_id' => $wrx->id,
            'marca_id' => $subaru->id,
            'cor_id' => $azul->id,
            'ano_fabricacao' => '2011',
            'quilometragem' => 70000,
            'valor_total' => 143386.00,
        ], [
            'detalhes' => 'Esportivo lendário com motor boxer 2.5 turbo, tração integral Symmetrical AWD e câmbio manual de 6 marchas. É famoso pela dirigibilidade precisa e desempenho agressivo, acelerando de 0 a 100 km/h em cerca de 5 segundos. O design combina aerodinâmica, capô com entrada de ar e o icônico aerofólio traseiro.',
            'url_foto1' => 'https://upload.wikimedia.org/wikipedia/commons/c/c0/The_frontview_of_Subaru_WRX_STI_Type_S_%28VAB%29.JPG',
            'url_foto2' => 'https://live.staticflickr.com/2659/4429639608_545a35315f_b.jpg',
            'url_foto3' => 'https://images.cars.com/cldstatic/wp-content/uploads/subaru-wrx-sti-series-white-2020-17-cockpit-shot--dashboard--front-row--interior.jpg',
        ]);

        Carro::firstOrCreate([
            'modelo_id' => $escalade->id,
            'marca_id' => $cadillac->id,
            'cor_id' => $preto->id,
            'ano_fabricacao' => '2025',
            'quilometragem' => 18000,
            'valor_total' => 1400000.00,
        ], [
            'detalhes' => 'SUV de luxo imponente com motor V8 de 6.2 litros e interior sofisticado, repleto de tecnologia e conforto premium. Possui sistema de som AKG, telas OLED curvas e ampla capacidade para passageiros e bagagem. É referência em luxo, potência e presença no segmento de utilitários grandes.',
            'url_foto1' => 'https://www.cadillac.com/content/dam/cadillac/na/us/english/index/vehicles/2026/suvs/escalade-mcm/gallery/my25-escalade-gallery-exterior-grid-front.jpg?imwidth=1920',
            'url_foto2' => 'https://www.cadillac.com/content/dam/cadillac/na/us/english/index/vehicles/2026/suvs/escalade-mcm/overview/my26-escalade-mov-trims-platinum-luxury-v2.png?imwidth=1920',
            'url_foto3' => 'https://dealerinspire-image-library-prod.s3.us-east-1.amazonaws.com/images/oIFKyiYFe5gEfzFE1oC5HTxtoGyeLtM873IFKYQM.jpg',
        ]);

        Carro::firstOrCreate([
            'modelo_id' => $sf90->id,
            'marca_id' => $ferrari->id,
            'cor_id' => $vermelho->id,
            'ano_fabricacao' => '2025',
            'quilometragem' => 0,
            'valor_total' => 4989000.00,
        ], [
            'detalhes' => 'A Ferrari SF90 Stradale é um supercarro híbrido plug-in com motor V8 biturbo de 4.0 litros e três motores elétricos, somando 1.000 cv de potência total. Ela acelera de 0 a 100 km/h em cerca de 2,5 segundos, possui tração integral e design aerodinâmico agressivo que combina elegância e desempenho extremo — é uma das Ferraris mais potentes já produzidas.',
            'url_foto1' => 'https://hips.hearstapps.com/hmg-prod/images/3lor0019-1593118792.jpg?crop=1.00xw%3A1.00xh%3B0%2C0&resize=640%3A%2A',
            'url_foto2' => 'https://www.amalgamcollection.com/cdn/shop/products/FerrariSF90Stradale1.8Scale-Custom-RightSide_4000x2677_crop_center.jpg?v=1612891619',
            'url_foto3' => 'https://hips.hearstapps.com/hmg-prod/images/2024-ferrari-sf90-xx-stradale-119-654a6698215b0.jpg?crop=1.00xw%3A0.987xh%3B0%2C0&resize=980%3A%2A',
        ]);
    }

}