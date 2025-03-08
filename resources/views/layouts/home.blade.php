<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" href="/img/tablogo.webp">
    <title>{{ $title }}</title>
</head>

<body>
    @include('partials.header')
    <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow">
        @yield('container')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        if ($('#search-table').length) {
            new simpleDatatables.DataTable('#search-table', {
                searchable: true
            });
        }
        if ($('#default-table').length) {
            new simpleDatatables.DataTable('#default-table', {
                searchable: false,
                paging: false,
                footer: false
            });
        }

        setTimeout(function() {
            const alertDialog = $('#alertDialog');
            if (alertDialog.length) {
                alertDialog.hide();
            }
        }, 3000);
    </script>
</body>

</html>
