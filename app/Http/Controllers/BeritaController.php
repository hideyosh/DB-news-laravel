<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index() {
        $hotNews = Berita::latest()->first();
        $hotNews2 = Berita::latest()->take(3)->get();
        $latestNews = Berita::latest()->take(4)->get();
        $headlineRecommend = Berita::latest()->first();
        $recommendations = Berita::inRandomOrder()->take(4)->get();
        $sciences = Berita::where('kategori_id', 1)->take(2)->get();
        $sports = Berita::where('kategori_id', 2)->take(2)->get();

        return view('berita.index', [
            'hotNews' => $hotNews,
            'hotNews2' => $hotNews2,
            'latestNews' => $latestNews,
            'recommendations' => $recommendations,
            'headlineRecommend' => $headlineRecommend,
            'sciences' => $sciences,
            'sports' => $sports,
        ]);
    }

    public function show(Berita $berita) {
        $rekomendasi = Berita::where('id', '!=', $berita->id)->take(5)->get();

        $berita->load('komentar');

        return view('berita.show', [
            'berita' => $berita,
            'rekomendasis' => $rekomendasi
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048','judul' => 'required|string|max:255',
            'ringkasan' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $path = $gambar->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'ringkasan' => $request->ringkasan,
            'kategori_id' => $request->kategori_id,
            'wartawan_id' => $request->wartawan_id,
            'gambar' => $path ?? null,
        ]);

        return redirect()->back();
    }
}
