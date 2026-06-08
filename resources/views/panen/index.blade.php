<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Hasil Panen</title>
</head>
<body style="font-family: Arial, sans-serif; padding: 20px;">
    <h2>Daftar Hasil Panen Pertanian</h2>
    <div style="margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; background-color: #f9f9f9;">
    <h3>Tambah Data Panen</h3>
    
    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tambah-panen" method="POST">
        @csrf <label>Nama Komoditas:</label><br>
        <input type="text" name="nama_komoditas" value="{{ old('nama_komoditas') }}"><br><br>

        <label>Jumlah (Kg):</label><br>
        <input type="text" name="jumlah_kg" value="{{ old('jumlah_kg') }}"><br><br>

        <label>Tanggal Panen:</label><br>
        <input type="date" name="tanggal_panen" value="{{ old('tanggal_panen') }}"><br><br>

        <button type="submit">Simpan Data</button>
    </form>
    </div>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="background-color:#f2f2f2;">
            <tr>
                <th>No</th>
                <th>Nama Komoditas</th>
                <th>Jumlah (Kg)</th>
                <th>Tanggal Panen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataPanen as $index => $item)
            <tr>
                <td align="center">{{ $index + 1 }}</td>
                <td>{{ $item->nama_komoditas }}</td>
                <td align="center">{{ $item->jumlah_kg }}</td>
                <td align="center">{{ $item->tanggal_panen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>