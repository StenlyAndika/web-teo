<header class="fixed w-full">
    <nav class="bg-white border-gray-200 py-2.5 dark:bg-gray-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl px-4 mx-auto">
            <a href="{{ route('welcome') }}" class="flex items-center">
                <img src="/img/tablogo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">SMP Negeri 29
                    Kerinci</span>
            </a>
            {{-- <div class="flex items-center lg:order-2">
                <a href="{{ route('login') }}"
                    class="text-white bg-blue-500 hover:bg-green-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm font-bold px-4 lg:px-5 py-2 lg:py-2.5 sm:mr-2 lg:mr-0 focus:outline-none">Login</a>
            </div> --}}
            @can('checkadmin')
                <form action="{{ route('generateadmin') }}" method="post">
                    @csrf
                    @method('post')
                    <button type="submit"
                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Generate
                        Admin</button>
                </form>
            @endcan
        </div>
    </nav>
</header>
