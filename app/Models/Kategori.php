<?php

namespace App\Models;

use Database\Factories\BeritaFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoris';
    protected $fillable = ['nama_kategori'];

    public function berita() {
        return $this->hasMany(Berita::class, 'berita_id');
    }
}
