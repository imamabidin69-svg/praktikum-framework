<div style="width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
    <h2>Login Sistem</h2>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($errors->any())
        <p style="color: red;">{{ $errors->first() }}</p>
    @endif

    <form action="/login" method="POST">
        @csrf
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="/register">Daftar di sini</a></p>
</div>