<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Habit Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            max-width: 300px;
        }
        button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div>
        <h1>Buat Habit Baru</h1>

        <form action="{{ route('habits.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Nama Habit</label>
                <input type="text" name="name" id="name" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="frequency">Frekuensi</label>
                <input type="text" name="frequency" id="frequency" required>
                @error('frequency')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" required>
                @error('start_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="end_date">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date" required>
                @error('end_date')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Simpan Habit</button>
            <a href="{{ route('habits.index') }}">Kembali</a>
        </form>
    </div>
</body>
</html>