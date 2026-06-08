<div style="width: 300px; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
    <h2>Register / Daftar Baru</h2>
    <form action="/register" method="POST">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" required><br><br>
        
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>
        
        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>
        
        <button type="submit">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
</div>