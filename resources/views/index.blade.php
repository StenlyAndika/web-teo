@extends('layouts.home')

@section('container')
    @if (session('toast_success'))
        <div id="alertDialog"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-green-100 rounded-lg shadow fixed bottom-5 right-5"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toast_success') }}</div>
        </div>
    @endif
    @if (session('toast_error'))
        <div id="alertDialog"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-100 rounded-lg shadow fixed bottom-5 right-5"
            role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd"
                        d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z"
                        clip-rule="evenodd" />
                </svg>
                <span class="sr-only">Check icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toast_error') }}</div>
        </div>
    @endif
    <section class="bg-white">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-3xl mb-4 text-4xl font-bold text-left md:text-5xl xl:text-6xl">Selamat Datang <br>SMP Negeri 29 Kerinci.</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl text-left">Penerimaan peserta didik baru tahun ajaran 2025/2026, klik tombol mendaftar dibawah untuk melakukan pendaftaran secara daring.</p>
                <div class="space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('daftar') }}" class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-center text-white bg-emerald-500 border border-gray-200 rounded-lg sm:w-auto hover:bg-emerald-400 focus:ring-4 focus:ring-gray-100">Daftar akun baru</a>
                    <a href="{{ route('login') }}"
                    class="inline-flex items-center justify-center w-full px-5 py-3 text-sm font-bold text-center text-white bg-blue-500 border border-gray-200 rounded-lg sm:w-auto hover:bg-blue-400 focus:ring-4 focus:ring-gray-100">Login</a>
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
