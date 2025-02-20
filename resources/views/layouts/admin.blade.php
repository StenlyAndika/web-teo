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
    @if (auth()->user())
        @include('partials.nav')
        <div class="p-4 sm:ml-64 mt-16">
            <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow">
                @yield('container')
            </div>
        </div>
    @else
        @yield('containerlogin')
    @endif
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

        $('#cari_jaksa').autocomplete({
            appendTo: '#default-modal-penuntut-umum',
            source: function(request, response) {
                $.ajax({
                    url: "{{ route('data_jaksa') }}",
                    data: {
                        term: request.term
                    },
                    dataType: "json",
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 2,
            select: function(event, ui) {
                $('#id_jaksa').val(ui.item.id);
            }
        });

        $('#jaksaFormSubmit').on('submit', function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        updateTable();
                    }
                    $('#cari_jaksa').val('');
                    $('#id_jaksa').val('');
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        });

        function updateTable() {
            $.ajax({
                url: '{{ route('get_temp_jaksa') }}',
                method: 'GET',
                success: function(response) {
                    var tableBody = $('#default-table tbody');
                    tableBody.empty();
                    var i = 1;
                    response.data.forEach(function(item) {
                        tableBody.append('<tr data-id="' + item.id_jaksa + '"><td>' + i +
                            '</td><td>' +
                            item
                            .nip + '</td><td>' + item.nama + '</td><td>' + item
                            .pangkat +
                            '</td><td><button type="button" class="block text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-5 py-2.5 text-center hapusJaksa">Hapus</button></td></tr>'
                        );
                        i++;
                    });

                    attachDeleteHandlers();
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        function attachDeleteHandlers() {
            $('.hapusJaksa').on('click', function(e) {
                e.preventDefault();

                var row = $(this).closest('tr');
                var id = row.data('id');

                $.ajax({
                    url: '/delete-temp-jaksa/' + id,
                    method: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            row.remove();
                        } else {
                            console.log('Failed to delete data.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error deleting data:', error);
                    }
                });
            });
        }

        $('#submitTempJaksa').on('click', function(e) {
            $('#jaksaContainer').load(location.href + ' #jaksaContainer');
        });
    </script>

    @if (request()->segment(3) == 'penspdp' && request()->segment(4) == 'create')
        <script>
            $(document).ready(function() {
                $('#form-tersangka').on('submit', function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        success: function(response) {
                            $('[data-modal-hide="default-modal-tersangka"]').click();
                            $('#tersangkaContainer').load(location.href + ' #tersangkaContainer');
                        },
                        error: function(response) {
                            alert('An error on objective occurred. Please try again.');
                        }
                    });
                });
            });
        </script>
    @endif

    @if (request()->segment(4) == 'pbp' && request()->segment(5) == 'create')
        <script>
            $(document).ready(function() {
                let id = $('#no_spdp_cari').val();

                if (id != "-- Pilih --") {
                    let containerSPDP = $('.spdp-container');
                    containerSPDP.html("");

                    $.ajax({
                        url: "{{ url('data-spdp') }}/" + id,
                        type: "GET",
                        success: function(response) {
                            containerSPDP.append(response);
                            $('#id_penerimaan_spdp').val(id);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }

                $('#no_spdp_cari').on('change', function() {

                    let id = $(this).val();

                    let containerSPDP = $('.spdp-container');
                    containerSPDP.html("");

                    $.ajax({
                        url: "{{ url('data-spdp') }}/" + id,
                        type: "GET",
                        success: function(response) {
                            containerSPDP.append(response);
                            $('#id_penerimaan_spdp').val(id);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                });
            });
        </script>
    @endif

    @if (request()->segment(4) == 'beritaacara' && request()->segment(5) == 'create')
        <script>
            $(document).ready(function() {
                let id = $('#no_spdp_cari').val();

                if (id != "-- Pilih --") {
                    let containerSPDP = $('.spdp-container');
                    containerSPDP.html("");

                    $.ajax({
                        url: "{{ url('data-spdp') }}/" + id,
                        type: "GET",
                        success: function(response) {
                            containerSPDP.append(response);
                            $('#id_penerimaan_spdp').val(id);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                }

                $('#no_spdp_cari').on('change', function() {

                    let id = $(this).val();

                    let containerSPDP = $('.spdp-container');
                    containerSPDP.html("");

                    $.ajax({
                        url: "{{ url('data-spdp') }}/" + id,
                        type: "GET",
                        success: function(response) {
                            containerSPDP.append(response);
                            $('#id_penerimaan_spdp').val(id);
                        },
                        error: function(jqXHR, textStatus, errorThrown) {}
                    });
                });
            });
        </script>
    @endif
</body>

</html>
