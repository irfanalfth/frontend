<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <title>{{ $title }} - KGM Test</title>
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

        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 mt-3">
                    <div class="card-body p-4 p-sm-5">
                        <h5 class="card-title text-center mb-5 fs-2">Tambah Barang</h5>
                        <form action="{{ route('barang.add') }}" method="POST">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="kodebr" id="kodebr"
                                    placeholder="Kode Barang">
                                <label for="floatingInput">Kode Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama" id="nama"
                                    placeholder="Nama Barang">
                                <label for="floatingInput">Nama Barang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"name="gdg" id="gdg"
                                    placeholder="Gudang">
                                <label for="floatingInput">Gudang</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="harga" id="harga"
                                    placeholder="Harga Barang">
                                <label for="floatingInput">Harga Barang</label>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
