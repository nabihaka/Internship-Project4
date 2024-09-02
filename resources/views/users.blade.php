<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Menentukan karakter encoding untuk dokumen HTML -->
    <meta charset="UTF-8">
    <!-- Menentukan viewport untuk memastikan tata letak yang responsif pada perangkat mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menentukan kompatibilitas dengan Internet Explorer -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Judul halaman yang akan ditampilkan di tab browser -->
    <title>Project 4 Internship</title>
    <!-- Link ke stylesheet Bootstrap untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    {{-- Menampilkan list dari seluruh user yang ada --}}
    <div class="container">
        <!-- Card Bootstrap untuk menampilkan data pengguna -->
        <div class="card">
            <!-- Header card dengan judul dan tombol untuk menambahkan pengguna baru -->
            <div class="card-header">
                CRUD System
                <!-- Tombol untuk menambahkan pengguna baru, ditempatkan di pojok kanan atas -->
                <a href="/add/user" class="btn btn-success btn-sm float-end">Add New</a>
            </div>
            
            <!-- Menampilkan pesan sukses jika ada -->
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{ Session::get('success') }}</span>
            @endif
            
            <!-- Menampilkan pesan error jika ada -->
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
            
            <!-- Bagian konten card untuk menampilkan tabel data pengguna -->
            <div class="card-body">
                <!-- Tabel untuk menampilkan daftar pengguna -->
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <!-- Judul kolom tabel -->
                        <th>S/N</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Registration Date</th>
                        <th>Last Update</th>
                        <!-- Kolom aksi dengan tombol Edit dan Delete -->
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <!-- Mengecek apakah ada pengguna yang ditemukan -->
                        @if (count($all_users) > 0)
                            <!-- Mengulangi setiap pengguna untuk menampilkan data -->
                            @foreach ($all_users as $item)
                                <tr>
                                    <!-- Menampilkan nomor urut pengguna -->
                                    <td>{{ $loop->iteration }}</td>
                                    <!-- Menampilkan nama lengkap pengguna -->
                                    <td>{{ $item->name }}</td>
                                    <!-- Menampilkan email pengguna -->
                                    <td>{{ $item->email }}</td>
                                    <!-- Menampilkan nomor telepon pengguna -->
                                    <td>{{ $item->phone_number }}</td>
                                    <!-- Menampilkan tanggal pendaftaran pengguna -->
                                    <td>{{ $item->created_at }}</td>
                                    <!-- Menampilkan tanggal pembaruan terakhir pengguna -->
                                    <td>{{ $item->updated_at }}</td>
                                    <!-- Tombol Edit untuk mengedit data pengguna -->
                                    <td><a href="/edit/{{ $item->id }}" class="btn btn-primary btn-sm">Edit</a></td>
                                    <!-- Tombol Delete untuk menghapus data pengguna -->
                                    <td><a href="/delete/{{ $item->id }}" class="btn btn-danger btn-sm">Delete</a></td>
                                </tr>
                            @endforeach
                        @else
                            <!-- Menampilkan pesan jika tidak ada pengguna ditemukan -->
                            <tr>
                                <td colspan="8">No User Found!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
