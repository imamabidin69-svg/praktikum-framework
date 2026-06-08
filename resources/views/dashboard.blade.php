<div style="margin: 50px auto; text-align: center;">
    <h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
    
    <div style="margin: 20px;">
        <a href="/data-panen" style="background-color: blue; color: white; padding: 10px; text-decoration: none; border-radius: 5px;">
            Lihat Data Panen
        </a>
    </div>

    <form action="/logout" method="POST" style="margin-top: 20px;">
        @csrf
        <button type="submit" style="background-color: red; color: white; padding: 10px;">Logout</button>
    </form>
</div>