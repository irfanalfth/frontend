<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>{{ $title }}  - KGM Test</title>
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
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 mt-1">
                                <h4>Laporan</h4>
                            </div>
                            <div class="col-lg-6 col-5 text-end">
                                <div class="float-lg-end">
                                    <a class="btn btn-danger btn-sm my-2 text-white" href="/project/addTask/asd">Generate PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">No
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Kode Barang
                                        </th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                            Bulan</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rata Rata Harga</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                           Rata Rata Jumlah</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                            Rata Rata Sub Total</th>
                                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">
                                            Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $n = 1;
                                    @endphp

                                    @foreach ($detail_bpb as $item)
                                    <tr>
                                        <td>{{ $n++ }}</td>
                                        <td>{{ $item->kodebr }}</td>
                                        <td>{{ $item->bulan }}</td>
                                        <td>{{ $item->rata_rata_harga }}</td>
                                        <td>{{ $item->rata_rata_jumlah }}</td>
                                        <td>{{ $item->rata_rata_subtotal }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm text-white"
                                                    href="/laporan/pdf/<?= $item->kodebr ?>">PDF</a></td>
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
</body>

</html>
