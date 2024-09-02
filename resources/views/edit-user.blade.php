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
        <!-- Card Bootstrap untuk menampilkan form pengeditan pengguna -->
        <div class="card">
            <!-- Header card dengan judul "Edit User" -->
            <div class="card-header">Edit User</div>
            
            <!-- Menampilkan pesan error jika ada -->
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{ Session::get('fail') }}</span>
            @endif
            
            <!-- Bagian konten card untuk menampilkan form pengeditan -->
            <div class="card-body">
                <!-- Form untuk mengirim data pengeditan pengguna ke server -->
                <form action="{{ route('EditUser') }}" method="post">
                    @csrf
                    <!-- Input tersembunyi untuk mengirim ID pengguna yang sedang diedit -->
                    <input type="hidden" name="user_id" id="" value="{{ $user->id }}">
                    
                    <!-- Input untuk nama lengkap pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Full Name</label>
                        <input type="text" name="full_name" value="{{ $user->name }}" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                        <!-- Menampilkan pesan error jika validasi nama lengkap gagal -->
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Input untuk email pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                        <!-- Menampilkan pesan error jika validasi email gagal -->
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Input untuk nomor telepon pengguna -->
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Phone Number</label>
                        <input type="number" name="phone_number" value="{{ $user->phone_number }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Phone Number">
                        <!-- Menampilkan pesan error jika validasi nomor telepon gagal -->
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <!-- Tombol untuk mengirim form -->
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
