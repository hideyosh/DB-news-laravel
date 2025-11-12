<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'beritas';
    protected $fillable = ['judul', 'isi', 'ringkasan', 'wartawan_id', 'kategori_id'];

    public function wartawan() {
        return $this->belongsTo(Wartawan::class, 'wartawan_id');
    }

    public function komentar() {
        return $this->hasMany(Komentar::class, 'berita_id');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
