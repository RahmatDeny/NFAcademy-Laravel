<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // Nama tabel
    protected $table = 'books';
    public $timestamps = false;

    // Kolom yang bisa diisi (fillable)
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'cover_photo',
        'genre_id',
        'author_id',
    ];

    /**
     * Relasi ke model Genre (many-to-one)
     * Satu buku memiliki satu genre.
     */
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    /**
     * Relasi ke model Author (many-to-one)
     * Satu buku ditulis oleh satu author.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
