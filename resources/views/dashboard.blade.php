<div style="margin: 50px auto; text-align: center;">
    <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
    <p>Ini adalah halaman Landing Page/Dashboard khusus pengguna yang sudah Login.</p>
    
    <form action="/logout" method="POST">
        @csrf
        <button type="submit" style="background-color: red; color: white; padding: 10px;">Logout</button>
    </form>
</div>