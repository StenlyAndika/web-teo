@extends('layouts.home')
@section('container')
    <!-- Toast Notifications -->
    @if (session('toast_success'))
        <div id="toast-success" class="fixed top-4 right-4 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toast_success') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    @if (session('toast_error'))
        <div id="toast-danger" class="fixed top-4 right-4 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
            <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"/>
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">{{ session('toast_error') }}</div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-danger" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>
        </div>
    @endif

    <div class="w-full h-96 bg-cover bg-center bg-no-repeat absolute" style="background-image: url('/img/bg.jpg')">
        <!-- Gradient Overlay -->
        <div class="w-full h-full bg-gradient-to-r from-blue-900/10 to-purple-900/10"></div>
    </div>

    <!-- Hero Section -->
    <section class="relative overflow-hidden pt-40">
        <!-- Decorative Elements -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-gradient-to-br from-blue-400 to-purple-500 rounded-full opacity-20 animate-pulse"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-gradient-to-br from-emerald-400 to-blue-500 rounded-full opacity-20 animate-pulse"></div>

        <div class="relative z-10 px-4 mx-auto max-w-screen-xl pt-6 pb-8 lg:pb-16 lg:px-6">
            <div class="grid lg:grid-cols-12 gap-8 lg:gap-16">
                <!-- Content Section -->
                <div class="lg:col-span-7 flex flex-col justify-center">
                    <!-- Status Badge -->
                    <div class="inline-flex items-center mb-6 px-4 py-2 text-sm font-medium text-gray-900 bg-white rounded-full shadow-sm border border-gray-200 w-fit">
                        <span class="w-2 h-2 bg-green-500 rounded-full mr-2 animate-pulse"></span>
                        Pendaftaran Tahun 2025/2026 Dibuka
                    </div>

                    <!-- Main Heading -->
                    <h1 class="mb-6 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">
                        Selamat Datang
                        <span class="block text-transparent bg-clip-text bg-gradient-to-r from-emerald-500 to-blue-600">
                            SMP Negeri 29 Kerinci
                        </span>
                    </h1>

                    <!-- Description -->
                    <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl">
                        Bergabunglah dengan keluarga besar SMP Negeri 29 Kerinci dan wujudkan masa depan yang cerah. Pendaftaran peserta didik baru tahun ajaran 2025/2026 telah dibuka!
                    </p>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 mb-8">
                        <a href="{{ route('daftar') }}" class="text-white bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 shadow-lg shadow-emerald-500/50 dark:shadow-lg dark:shadow-emerald-800/80 font-medium rounded-lg text-sm px-8 py-3 text-center inline-flex items-center justify-center transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                            </svg>
                            Daftar Sekarang
                        </a>
                        <a href="{{ route('login') }}" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-8 py-3 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700 inline-flex items-center justify-center transform hover:scale-105 transition-all duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            Login
                        </a>
                        @can('checkadmin')
                            <form action="{{ route('generateadmin') }}" method="post">
                                @csrf
                                @method('post')
                                <button type="submit"
                                    class="text-white bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 shadow-lg shadow-emerald-500/50 dark:shadow-lg dark:shadow-emerald-800/80 font-medium rounded-lg text-sm px-8 py-3 text-center inline-flex items-center justify-center transform hover:scale-105 transition-all duration-200">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                                        </svg>Generate Admin
                                </button>
                            </form>
                        @endcan
                    </div>

                    <!-- Feature Cards -->
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <div class="p-4 bg-white/80 backdrop-blur-sm rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-emerald-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Pendaftaran Online</h3>
                                    <p class="text-sm text-gray-600">Mudah & Cepat</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white/80 backdrop-blur-sm rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Kurikulum Terkini</h3>
                                    <p class="text-sm text-gray-600">Berkualitas</p>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-white/80 backdrop-blur-sm rounded-lg border border-gray-200 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex items-center mb-2">
                                <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900">Tenaga Pendidik</h3>
                                    <p class="text-sm text-gray-600">Profesional</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Section -->
                <div class="lg:col-span-5 flex items-center justify-center">
                    <div class="relative">
                        <!-- Decorative background -->
                        <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-blue-500 rounded-3xl transform rotate-6 opacity-20"></div>
                        <div class="absolute inset-0 bg-gradient-to-r from-purple-400 to-pink-500 rounded-3xl transform -rotate-6 opacity-20"></div>

                        <!-- Image container -->
                        <div class="relative bg-white/90 backdrop-blur-sm rounded-3xl p-6 shadow-2xl border border-white/20">
                            <img src="/img/hero.png" alt="hero image" class="w-full h-auto rounded-2xl shadow-lg hover:scale-105 transition-transform duration-300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Information Cards Section -->
    <section class="bg-white py-16">
        <div class="max-w-screen-xl px-4 mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih SMP Negeri 29 Kerinci?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Sekolah dengan standar pendidikan tinggi yang mengutamakan karakter, prestasi, dan masa depan siswa</p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Card 1 -->
                <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-emerald-500 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Fasilitas Lengkap</h3>
                    <p class="text-gray-600">Gedung modern dengan fasilitas laboratorium, perpustakaan, dan ruang kelas yang nyaman</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Metode Pembelajaran Inovatif</h3>
                    <p class="text-gray-600">Pendekatan pembelajaran yang mengintegrasikan teknologi dan metode interaktif</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Prestasi Membanggakan</h3>
                    <p class="text-gray-600">Berbagai prestasi akademik dan non-akademik di tingkat kabupaten dan provinsi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-gradient-to-r from-emerald-500 to-blue-600 py-16">
        <div class="max-w-screen-xl px-4 mx-auto text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Siap Bergabung dengan Kami?</h2>
            <p class="text-emerald-100 mb-8 max-w-2xl mx-auto">Daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar SMP Negeri 29 Kerinci</p>
            <a href="{{ route('daftar') }}" class="text-emerald-600 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-emerald-300 font-medium rounded-lg text-lg px-8 py-3 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700 inline-flex items-center justify-center transform hover:scale-105 transition-all duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                Mulai Daftar Sekarang
            </a>
        </div>
    </section>
@endsection

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
