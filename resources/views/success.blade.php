@extends('layouts.home')

@section('container')
<section class="bg-white">
    <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-3xl mb-4 text-4xl text-green-500 font-bold text-left md:text-5xl xl:text-5xl">Selamat {{ session('nama_success') }}<br>Pendaftaran berhasil.</h1>
            <p class="max-w-2xl mb-6 font-bold text-gray-500 lg:mb-8 md:text-lg lg:text-xl text-left">Pendaftaranmu telah selesai dilakukan, Untuk informasi selanjutnya akan dikirim melalui whatsapp, ditunggu ya!.</p>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
            <img src="/img/hero.png" alt="hero image">
        </div>
    </div>
</section>
@endsection
