<div style="width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
    <h2>Register / Daftar Baru</h2>
    
    @if($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red; background-color: #ffe6e6;">
            <strong>Registrasi Gagal:</strong>
            <ul style="margin-top: 5px; padding-left: 20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" value="{{ old('name') }}" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}" required><br><br>
        
        <label>Password (Min. 6 Karakter):</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
</div>