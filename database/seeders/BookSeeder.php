<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('books')->insert([
            [
                'title' => 'Kambing Jantan',
                'description' => 'Kumpulan kisah lucu dan reflektif tentang kehidupan mahasiswa Indonesia di luar negeri, penuh humor khas Raditya Dika.',
                'price' => 69000,
                'stock' => 25,
                'cover_photo' => '/img/books/kambing-jantan.jpg',
                'genre_id' => 1, // Pastikan id genre sesuai di tabel genres
                'author_id' => 1, // Raditya Dika
            ],
            [
                'title' => 'Negeri 5 Menara',
                'description' => 'Novel inspiratif tentang perjuangan enam santri di pesantren yang memiliki cita-cita tinggi, dengan semboyan “Man Jadda Wajada”.',
                'price' => 75000,
                'stock' => 30,
                'cover_photo' => '/img/books/negeri-5-menara.jpg',
                'genre_id' => 2,
                'author_id' => 2,
            ],
            [
                'title' => 'Dilan: Dia adalah Dilanku Tahun 1990',
                'description' => 'Kisah cinta remaja Bandung tahun 90-an antara Dilan dan Milea, dengan gaya bahasa ringan dan nostalgic.',
                'price' => 68000,
                'stock' => 20,
                'cover_photo' => '/img/books/dilan-1990.jpg',
                'genre_id' => 3,
                'author_id' => 3,
            ],
            [
                'title' => 'Laut Bercerita',
                'description' => 'Novel berlatar sejarah tragedi 1998 yang menggambarkan perjuangan aktivis muda melawan ketidakadilan rezim.',
                'price' => 99000,
                'stock' => 18,
                'cover_photo' => '/img/books/laut-bercerita.jpg',
                'genre_id' => 4,
                'author_id' => 4,
            ],
            [
                'title' => 'Critical Eleven',
                'description' => 'Novel romance modern yang mengupas perjalanan cinta dan konflik rumah tangga pasangan muda kelas menengah atas.',
                'price' => 85000,
                'stock' => 22,
                'cover_photo' => '/img/books/critical-eleven.jpg',
                'genre_id' => 5,
                'author_id' => 5,
            ],
        ]);
    }
}
