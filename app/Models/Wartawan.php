<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wartawan extends Model
{
    use HasFactory;
    protected $table = 'wartawans';
    protected $fillable = ['nama', 'email'];

    public function berita() {
        return $this->hasMany(berita::class, 'wartawan_id');
    }
}
