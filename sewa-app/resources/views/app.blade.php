<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Sewa App')</title>
    <style>
        table, th, td{
            border:1px solid black;
            padding:5px;
        }
    </style>

    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="..." crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}"> Sewa App</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                          <a> Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <table>
            <thead>
                <tr style="background-color: beige ">
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Tanggal Mulai Sewa</th>
                    <th>Tanggal Selesai Sewa</th>
                    <th>Tanggal Buat Order</th>
                    <th>Tanggal Update Order</th>
                    <th>Id Kendaraan</th>
                </tr>
            </thead>
                @foreach ($data as $d)
                <tr>
                    <td>{{$d->id_transaksi}}</td>
                    <td>{{$d->nama_customer}}</td>
                    <td>{{$d->tanggal_mulai_sewa}}</td>
                    <td>{{$d->tanggal_selesai_sewa}}</td>
                    <td>{{$d->tanggal_buat_order}}</td>
                    <td>{{$d->tanggal_update_order}}</td>
                    <td>{{$d->id_kendaraan}}</td>

                    <td><a href="{{ route('edit', $d->id_transaksi) }}" class="btn btn-primary" >
                        @method('GET')Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('delete', $d->id_transaksi) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
        <br/>
        <a href="{{ route('add') }}" class="btn btn-success" >@method('GET') + Tambah Data</a>
</div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="..." crossorigin="anonymous"></script>
</body>
</html>
