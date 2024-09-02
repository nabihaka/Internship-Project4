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
    <title>Add New User</title>
    <!-- Link ke stylesheet Bootstrap untuk styling halaman -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <!-- Container Bootstrap untuk memusatkan konten -->
    <div class="container">
        <!-- Card Bootstrap untuk menampilkan formulir -->
        <div class="card">
            <!-- Header card yang menampilkan judul formulir -->
            <div class="card-header">Add New User</div>

            <!-- Menampilkan pesan error jika ada -->
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif

            <!-- Bagian konten card untuk menampilkan formulir -->
            <div class="card-body">
                <!-- Formulir untuk menambahkan pengguna baru -->
                <form action="{{ route('AddUser') }}" method="post">
                    <!-- CSRF token untuk melindungi dari serangan CSRF -->
                    @csrf
                    
                    <!-- Input untuk nama lengkap pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Full Name</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                        <!-- Menampilkan pesan error untuk input nama lengkap jika ada -->
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input untuk email pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                        <!-- Menampilkan pesan error untuk input email jika ada -->
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input untuk nomor telepon pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" value="{{ old('phone_number') }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Phone Number">
                        <!-- Menampilkan pesan error untuk input nomor telepon jika ada -->
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input untuk password pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Enter Password">
                        <!-- Menampilkan pesan error untuk input password jika ada -->
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input untuk konfirmasi password pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="formGroupExampleInput2" placeholder="Confirm Password">
                        <!-- Menampilkan pesan error untuk input konfirmasi password jika ada -->
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol untuk mengirim formulir -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
