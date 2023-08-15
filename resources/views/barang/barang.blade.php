<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>{{ $title }} - KGM Test</title>

    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/fh-3.4.0/r-2.5.0/sb-1.5.0/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.5/fh-3.4.0/r-2.5.0/sb-1.5.0/datatables.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">KGM Test</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('barang') }}">Barang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('laporan') }}">Laporan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="row mt-3">
            @include('utils.alert')
            <div class="col-lg-12 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 mt-1">
                                <h4>Barang</h4>
                            </div>
                            <div class="col-lg-6 col-5 text-end">
                                <div class="float-lg-end">
                                    <a class="btn btn-primary btn-sm my-1 text-white" href="{{ route('barang.add') }}">Tambah
                                        Data</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-3">
                            <table id="tableBarang" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-secondary opacity-7">Kode Barang
                                        </th>
                                        <th class="text-secondary opacity-7">
                                            Nama</th>
                                        <th class="text-secondary opacity-7">
                                            Gudang</th>
                                        <th class="text-secondary opacity-7">
                                            Harga</th>
                                        <th class="text-secondary opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <td><?= $item['kodebr'] ?></td>
                                            <td><?= $item['nama'] ?></td>
                                            <td><?= $item['gdg'] ?></td>
                                            <td><?= $item['harga'] ?></td>
                                            <td>
                                                <a class="btn btn-warning btn-sm text-white"
                                                    href="/barang/edit/<?= $item['kodebr'] ?>">Edit</a>
                                                <a class="btn btn-danger btn-sm text-white"
                                                    href="/barang/delete/<?= $item['kodebr'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#tableBarang').DataTable({
                searchable: true,
                paging: true,
            });
        });
    </script>
</body>

</html>
