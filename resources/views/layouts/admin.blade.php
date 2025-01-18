<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>
</head>

<body>
    @include('partials.nav')
    <div class="p-4 sm:ml-64 mt-16">
        <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow">
            @yield('container')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById('search-table')) new simpleDatatables.DataTable('#search-table');

        setTimeout(function() {
            const alertDialog = document.getElementById('alertDialog');
            if (alertDialog) {
                alertDialog.style.display = 'none';
            }
        }, 3000);
    </script>
</body>

</html>
