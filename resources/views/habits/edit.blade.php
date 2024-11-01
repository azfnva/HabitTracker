<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Habit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            margin-left: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        <h1>Edit Habit</h1>

        <form action="{{ route('habits.update', $habit->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Nama Habit</label>
                <input type="text" name="name" id="name" value="{{ old('name', $habit->name) }}" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="frequency">Frekuensi</label>
                <input type="text" name="frequency" id="frequency" value="{{ old('frequency', $habit->frequency) }}" required>
                @error('frequency')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="start_date">Tanggal Mulai</label>
                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $habit->start_date) }}" required>
                @error('start_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="end_date">Tanggal Selesai</label>
                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $habit->end_date) }}" required>
                @error('end_date')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit">Perbarui Habit</button>
            <a href="{{ route('habits.index') }}">Kembali</a>
        </form>
    </div>
</body>
</html>