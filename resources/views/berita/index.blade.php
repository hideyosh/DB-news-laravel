@extends('layouts.main')

@section('container')
{{-- <h1 class="text-3xl font-bold mb-6">Daftar Berita</h1>
    <div class="space-y-6">
        @foreach ($beritas as $news)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-2">
                    <a href="{{ route('berita.show', $news->id) }}" class="text-blue-600 hover:underline">
                        {{ $news->title }}
                    </a>
                </h2>
                <p class="text-gray-600 mb-4">Oleh: {{ $news->wartawan->nama }} | Dipublikasikan pada: {{ $news->created_at->format('d M Y') }}</p>
                <p class="text-gray-800">{{ Str::limit($news->ringkasan, 150, '...') }}</p>
                <a href="{{ route('berita.show', $news->id) }}" class="text-blue-500 hover:underline mt-4 inline-block">Baca Selengkapnya</a>
            </div>
        @endforeach
    </div> --}}
    <!-- Hot news content -->
    <div class="bg-[#F4F8FF] grid grid-cols-2 gap-4 ps-11 py-13 shadow-md">
        <div>
            <h1 class="font-bold font-flex text-3xl text-[#556E98] tracking-widest mb-5">HOT NEWS</h1>
            <a href="{{ route('berita.show', $hotNews->id) }}" class="block font-semibold font-serif text-2xl text-[#31363F] mb-2 w-11/12 tracking-wide hover:underline">{{ $hotNews->judul }}</a>
            <a href="{{ route('berita.show', $hotNews->id) }}" class="block font-medium font-flex text-base text-[#556E98] w-10/12 tracking-wide mb-5">Sports</a>
            <div class="relative group">
                <a href="{{ route('berita.show', $hotNews->id) }}">
                    <img class="w-full h-80 object-cover rounded-lg" src="{{ asset('storage/berita/hi-res-42500494c29628884236755b8b91d0b5_crop_north.jpg') }}" alt="Image description">
                    <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
                </a>
            </div>
        </div>
        <div>
            @foreach ($hotNews2 as $hotNews2)
                <div class="flex items-start pl-14 mb-6">
                    <!-- Bagian Teks -->
                    <div class="flex-1">
                        <a class="block font-semibold font-serif text-lg text-dark mb-2 hover:underline w-10/12 tracking-wide" href="{{ route('berita.show', $hotNews2->id) }}">
                            {{ Str::limit($hotNews2->judul, 50, '...') }}
                        </a>
                        <p class="font-medium font-roboto text-base text-dark mb-1 w-10/12">
                            {{ Str::limit($hotNews2->ringkasan, 100, '...') }}
                        </p>
                        <a href="{{ route('berita.show', $hotNews2->id) }}" class="block font-medium font-flex text-base text-[#556E98] tracking-wide w-10/12 mb-3">
                            {{ $hotNews2->kategori->nama_kategori }}
                        </a>
                    </div>
                    <!-- Bagian Gambar -->
                    <div class="relative group mr-12">
                        <a href="#">
                            <img class="w-56 h-32 object-cover rounded-lg" src="{{ asset('storage/berita/6c0da1f8805d1028b95b933f17f456b7.jpg') }}" alt="">
                            <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <div class="bg-white px-11 py-10">
        <div class="flex justify-between">
            <h1 class="font-bold font-flex text-3xl text-[#556E98] tracking-widest mb-5">LATEST NEWS</h1>
            <a href="#" class="flex font-roboto font-medium text-[#556E98] items-center transform transition-transform duration-300 hover:scale-110 ">
              See All
              <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-arrow-right cl ml-2" fll viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
              </svg>
            </a>
        </div>
        <div class="grid grid-cols-4 gap-10">
          @foreach ($latestNews as $latestNews)
          <div>
            <div class="relative group">
              <a href="#">
                <img class="rounded-lg w-full h-48 object-cover" src="{{ asset('storage/berita/5c92cdc0931c191419e5bc425d73568c.jpg') }}" alt="">
                <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
              </a>
            </div>
            <div class="mt-3">
              <a href="{{ route('berita.show', $latestNews->id) }}" class="block w-full font-serif font-semibold text-lg tracking-wide text-[#31363F] hover:underline">{{ str::limit($latestNews->judul, 50, '...') }}</a>
              <a href="{{ route('berita.show', $latestNews->id) }}" class="block font-medium font-flex text-base text-[#556E98] tracking-wide mt-2">{{ $latestNews->kategori->nama_kategori }}</a>
            </div>
          </div>
          @endforeach
        </div>
    </div>
    <!-- Recommendation -->
    <div class="bg-white px-11 py-10">
      <div class="flex justify-between">
        <h1 class="font-bold font-flex text-3xl text-[#556E98] tracking-widest mb-5">RECOMMENDATION</h1>
        <a href="#" class="flex font-roboto font-medium text-[#556E98] items-center transform transition-transform duration-300 hover:scale-110 ">
          See All
          <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-arrow-right cl ml-2" fll viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
          </svg>
        </a>
      </div>
      <div class="grid grid-rows-1 gap-10">
        <div class="grid grid-cols-1">
          <div>
            <div class="relative group">
              <a href="#" style="background-image: url('{{ asset('storage/berita/222772bf09f518cc7fd5acf78e812cfd.jpg   ') }}');" class="rounded-lg bg-cover bg-center h-104 w-full flex items-end p-9">
                <div class="bg-black w-11/12 text-[#F3F3F3] bg-opacity-40 py-5 ps-5 pe-2 rounded-lg">
                  <h1 class="font-serif font-semibold text-2xl tracking-wide mb-2">{{ Str::limit($headlineRecommend->judul, 50, '...') }}</h1>
                  <p class="font-roboto text-lg font-medium w-11/12 mb-3">{{ Str::limit($headlineRecommend->isi, 200, '...') }}</p>
                  <p class="font-flex text-base font-medium tracking-wide">{{ $headlineRecommend->kategori->nama_kategori }}</p>
                </div>
                <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
              </a>
            </div>
          </div>
        </div>
        <div class="grid grid-cols-4 gap-10">
          @foreach ($recommendations as $rec)
                <div>
                    <div class="relative group">
                        <a href="#">
                            <img class="rounded-lg w-full h-48 object-cover" src="{{ asset('storage/berita/5c92cdc0931c191419e5bc425d73568c.jpg') }}" alt="">
                            <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
                        </a>
                    </div>
                    <div class="mt-3">
                        <a href="#" class="block w-full font-serif font-semibold text-lg tracking-wide text-[#31363F] hover:underline">{{ $rec->judul }}</a>
                        <a href="#" class="block font-medium font-flex text-base text-[#556E98] tracking-wide mt-2">{{ $rec->kategori->nama_kategori }}</a>
                    </div>
                </div>
          @endforeach
        </div>
      </div>
    </div>

    <div class="grid grid-cols-4 gap-10 bg-white px-11 py-13">
      <div class="col-span-2">
        <div class="flex justify-between">
          <h1 class="font-bold font-flex text-3xl text-[#556E98] tracking-widest mb-5">SCIENCE</h1>
          <a href="#" class="flex font-roboto font-medium text-[#556E98] items-center transform transition-transform duration-300 hover:scale-110 ">
            See All
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-arrow-right cl ml-2" fll viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
            </svg>
          </a>
        </div>
        <div class="grid grid-cols-2 gap-10">
          @foreach ($sciences as $science)
            <div>
                <div class="relative group">
                <a href="{{ route('berita.show', $science->id) }}">
                    <img class="rounded-lg w-full h-48 object-cover" src="{{ asset('storage/berita/6e1c4fddfd2d6213f18fc3fd627a9b6b.jpg') }}" alt="">
                    <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
                </a>
                </div>
                <div class="mt-3">
                    <a href="{{ route('berita.show', $science->id) }}" class="block w-full font-serif font-semibold text-lg tracking-wide text-[#31363F] hover:underline">{{ $science->judul }}</a>
                    <a href="{{ route('berita.show', $science->id) }}" class="block font-medium font-flex text-base text-[#556E98] tracking-wide mt-2">{{ $science->kategori->nama_kategori }}</a>
                </div>
          </div>
          @endforeach
        </div>
      </div>

      <div class="col-span-2">
        <div class="flex justify-between">
          <h1 class="font-bold font-flex text-3xl text-[#556E98] tracking-widest mb-5">SPORTS</h1>
          <a href="#" class="flex font-roboto font-medium text-[#556E98] items-center transform transition-transform duration-300 hover:scale-110 ">
            See All
            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-arrow-right cl ml-2" fll viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
            </svg>
          </a>
        </div>
        <div class="grid grid-cols-2 gap-10">
          @foreach ($sports as $sport)
          <div>
                <div class="relative group">
                    <a href="{{ route('berita.show', $sport->id) }}">
                        <img class="rounded-lg w-full h-48 object-cover" src="{{ asset('storage/berita/dc6a3eb1ec5a408e5c5deb1e08007495.jpg') }}" alt="">
                        <div class="absolute inset-0 bg-gray-300 opacity-0 group-hover:opacity-35 rounded-lg transition-opacity"></div>
                    </a>
                </div>
                <div class="mt-3">
                    <a href="{{ route('berita.show', $science->id) }}" class="block w-full font-serif font-semibold text-lg tracking-wide text-[#31363F] hover:underline">{{ $sport->judul }}</a>
                    <a href="{{ route('berita.show', $science->id) }}" class="block font-medium font-flex text-base text-[#556E98] tracking-wide mt-2">{{ $sport->kategori->nama_kategori }}</a>
                </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
@endsection
