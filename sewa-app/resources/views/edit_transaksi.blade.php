
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sewa App')</title>
    <style>
        body{
            padding: 30px
        }
        table, th, td{
            border:1px solid black;
            padding:5px;
        }
    </style>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous">
</head>
<body>
        <form action="{{ route('update',$data->id_transaksi)}}" method="post">
            @method("PATCH")
            @csrf
            <div class="mb-3">
                <label for="nama_customer" class="form-label">Nama Customer:</label>
                <input type="text" class="form-control" id="nama_customer" name="nama_customer" required>
            </div>
            <div class="mb-3">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_mulai_sewa" class="form-label">Tanggal Mulai Sewa:</label>
                    <input type="date" class="form-control" id="tanggal_mulai_sewa" name="tanggal_mulai_sewa" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="tanggal_selesai_sewa" class="form-label">Tanggal Selesai Sewa:</label>
                    <input type="date" class="form-control" id="tanggal_selesai_sewa" name="tanggal_selesai_sewa" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="harga_sewa" class="form-label">Harga Sewa:</label>
                <input type="number" class="form-control" id="harga_sewa" name="harga_sewa" required>
            </div>
            <div class="mb-3">
                <label for="id_kendaraan" class="form-label">Id Kendaraan:</label>
                <input type="number" class="form-control" id="id_kendaraan" name="id_kendaraan" required>
            </div>

            <button type="submit" class="btn btn-success">Ubah Data</button>
        </form>
    </div>
</body>
