@extends('layouts.home')

@section('container')
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-3xl mb-4 text-4xl font-bold text-left md:text-5xl xl:text-6xl">Selamat Datang <br>SMP Negeri 29 Kerinci.</h1>
            <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl text-left">Penerimaan peserta didik baru tahun ajaran 2025/2026, klik tombol mendaftar dibawah untuk melakukan pendaftaran secara daring.</p>
            <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                <a href="{{ route('ppdb') }}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-green-100 focus:ring-4 focus:ring-gray-100">
                    <svg class="w-4 h-4 mr-2 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 511.99"><path fill="#00AB42" fill-rule="nonzero" d="M256 0c70.68 0 134.69 28.66 181.01 74.98C483.35 121.31 512 185.31 512 255.99c0 70.68-28.66 134.69-74.99 181.02-46.32 46.32-110.33 74.98-181.01 74.98-70.68 0-134.69-28.66-181.02-74.98C28.66 390.68 0 326.67 0 255.99S28.65 121.31 74.99 74.98C121.31 28.66 185.32 0 256 0zm116.73 236.15v39.69c0 9.39-7.72 17.12-17.11 17.12h-62.66v62.66c0 9.4-7.71 17.11-17.11 17.11h-39.7c-9.4 0-17.11-7.69-17.11-17.11v-62.66h-62.66c-9.39 0-17.11-7.7-17.11-17.12v-39.69c0-9.41 7.69-17.11 17.11-17.11h62.66v-62.67c0-9.41 7.7-17.11 17.11-17.11h39.7c9.41 0 17.11 7.71 17.11 17.11v62.67h62.66c9.42 0 17.11 7.76 17.11 17.11zm37.32-134.21c-39.41-39.41-93.89-63.8-154.05-63.8-60.16 0-114.64 24.39-154.05 63.8-39.42 39.42-63.81 93.89-63.81 154.05 0 60.16 24.39 114.64 63.8 154.06 39.42 39.41 93.9 63.8 154.06 63.8s114.64-24.39 154.05-63.8c39.42-39.42 63.81-93.9 63.81-154.06s-24.39-114.63-63.81-154.05z"/></svg> Mendaftar sebagai peserta didik baru
                </a>
                {{-- <form action="{{ route('admin.send.wa') }}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="no_telp" value="081315414388">
                    <input type="hidden" name="nama" value="Budi Kontel">
                    <button type="submit"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-green-100 focus:ring-4 focus:ring-gray-100">Send WA</button>
                </form> --}}
                    {{-- <a href="{{ route('teswa') }}"
                        class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-center text-gray-900 border border-gray-200 rounded-lg sm:w-auto hover:bg-green-100 focus:ring-4 focus:ring-gray-100">Send</a> --}}
            </div>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="/img/hero.png" alt="hero image">
        </div>
    </div>
</section>
@endsection
