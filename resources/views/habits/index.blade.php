<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habit Tracker</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .success-message {
            color: green;
            font-weight: bold;
        }
        .error-message {
            color: red;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        a:hover {
            text-decoration: underline;
        }
        button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div>
        <h1>Habit Tracker</h1>
        <a href="{{ route('habits.create') }}">Buat Habit Baru</a>

        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        @if($habits->isEmpty())
            <div>Tidak ada habit yang ditemukan.</div>
        @else
            <table>
                <thead>
                    <tr>
                        <th>ID Habit</th>
                        <th>Nama Habit</th>
                        <th>Frekuensi</th>
                        <th>Mulai</th>
                        <th>Selesai</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($habits as $habit)
                        <tr>
                            <td>{{ $habit->id }}</td>
                            <td>{{ $habit->name }}</td>
                            <td>{{ $habit->frequency }}</td>
                            <td>{{ $habit->start_date }}</td>
                            <td>{{ $habit->end_date }}</td>
                            <td>
                                <a href="{{ route('habits.edit', $habit->id) }}">Edit</a>
                                <form action="{{ route('habits.destroy', $habit->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>