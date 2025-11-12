<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function store(Request $request, Berita $berita) {
        $validated = $request->validate([
            'nama' => 'required',
            'isi' => 'required',
        ]);

        $berita->komentar()->create($validated);
        return redirect()->route('berita.show', $berita->id);
    }
}
