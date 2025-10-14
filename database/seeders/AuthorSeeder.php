<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'name' => 'Raditya Dika',
                'photo' => '/img/authors/raditya-dika.jpg',
                'bio' => 'Penulis, komedian, dan sutradara Indonesia terkenal dengan karya bergenre komedi romantis seperti “Kambing Jantan”.',
            ],
            [
                'name' => 'Ahmad Fuadi',
                'photo' => '/img/authors/ahmad-fuadi.jpg',
                'bio' => 'Penulis trilogi “Negeri 5 Menara” yang menginspirasi banyak anak muda Indonesia tentang semangat menuntut ilmu.',
            ],
            [
                'name' => 'Pidi Baiq',
                'photo' => '/img/authors/pidi-baiq.jpg',
                'bio' => 'Musisi dan penulis asal Bandung yang dikenal lewat novel “Dilan” dan “Milea”.',
            ],
            [
                'name' => 'Leila S. Chudori',
                'photo' => '/img/authors/leila-chudori.jpg',
                'bio' => 'Jurnalis dan penulis novel sejarah populer seperti “Pulang” dan “Laut Bercerita”.',
            ],
            [
                'name' => 'Ika Natassa',
                'photo' => '/img/authors/ika-natassa.jpg',
                'bio' => 'Penulis novel bertema urban-romance dan perbankan seperti “Critical Eleven” dan “Antologi Rasa”.',
            ],
        ]);
    }
}
