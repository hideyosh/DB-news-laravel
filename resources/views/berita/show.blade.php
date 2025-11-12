@extends('layouts.main')
@section('container')
<div class="bg-white px-7 sm:px-7 lg:px-11 pt-5 pb-32">
    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center text-base font-medium text-[#31363F] hover:text-[#556E98]">
                Home
            </a>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-dark mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="ms-1 text-base font-medium text-[#31363F] md:ms-2">
                Football
            </span>
            </div>
        </li>
        </ol>
    </nav>
    <div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-16">
        <div class="lg:col-span-2 mb-14 sm:mb-8 lg:mb-0 h-fit">
            <h1 class="font-serif font-semibold text-2xl mt-8 w-full lg:w-11/12 text-justify lg:text-left">{{ $berita->judul }}</h1>
            <p class="font-flex font-medium text-base tracking-wide mt-5 mb-1">By {{ $berita->wartawan->nama }}</p>
            <p class="font-flex font-medium text-base tracking-wide mb-7">Published {{ $berita->created_at->format('d M Y H:i') }}</p>
            <img class="w-full h-1/6 sm:h-2/6 lg:h-3/6 object-cover rounded-lg" src="{{ asset('storage/' . $berita->gambar) }}" alt="">
            <p class="font-roboto font-normal text-lg tracking-wide w-full lg:w-11/12 mx-auto mt-12 leading-relaxed text-justify">
              {{ $berita->isi }}
            </p>
        </div>
        <div class="lg:mt-48 h-auto lg:h-fit sticky top-7">
          <h1 class="font-roboto text-lg font-medium tracking-wide mb-5 border-b-4 border-[#556E98] pb-1 w-full">More From DB News</h1>
          <ul class="space-y-5 font-serif font-semibold text-base tracking-wide w-full text-justify">
            @foreach ($rekomendasis as $rekomendasi)
                <li>
                    <a href="{{ route('berita.show', $rekomendasi->id) }}" class="hover:underline">
                        {{ Str::limit($rekomendasi->judul, 50, '...') }}
                    </a>
                </li>
            @endforeach
          </ul>
        </div>
    </div>
    <!-- Section Komentar -->
    <div class="mt-16 w-full lg:w-full">
        <h2 class="font-roboto font-semibold text-xl mb-6 border-b-4 border-[#556E98] pb-1">Komentar</h2>

        <!-- Form Tambah Komentar -->
        <form action="{{ route('komentar.store', $berita->id) }}" method="POST" class="mb-10">
            @csrf
            <div class="mb-4">
                <label for="nama" class="block font-medium mb-1">Nama</label>
                <input type="text" name="nama" id="nama" class="w-full border border-gray-300 rounded-lg p-2" required>
            </div>
            <div class="mb-4">
                <label for="isi" class="block font-medium mb-1">Komentar</label>
                <textarea name="isi" id="isi" rows="4" class="w-full border border-gray-300 rounded-lg p-2" required></textarea>
            </div>
            <button type="submit" class="bg-[#556E98] text-white font-medium px-4 py-2 rounded-lg hover:bg-[#415a7c] transition">Kirim Komentar</button>
        </form>

        <!-- Daftar Komentar -->
        <div class="space-y-6">
            @forelse ($berita->komentar as $komentar)
                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                    <p class="font-semibold">{{ $komentar->nama }}</p>
                    <p class="text-gray-700 mt-1">{{ $komentar->isi }}</p>
                    <p class="text-gray-400 text-sm mt-1">Diposting pada {{ $komentar->created_at->format('d M Y H:i') }}</p>
                </div>
            @empty
                <p class="text-gray-500">Belum ada komentar. Jadilah yang pertama!</p>
            @endforelse
        </div>
    </div>

  </div>
@endsection
