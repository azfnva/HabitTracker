<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    /**
     * Menampilkan daftar semua habit.
     */
    public function index()
    {
        $habits = Habit::all(); // Ambil semua habit
        return view('habits.index', compact('habits'));
    }

    /**
     * Menampilkan form untuk membuat habit baru.
     */
    public function create()
    {
        return view('habits.create');
    }

    /**
     * Menyimpan habit baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'frequency' => 'required|string|max:255', // Tambahkan batasan panjang
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date', // Validasi end_date
        ]);

        Habit::create($request->only(['name', 'frequency', 'start_date', 'end_date']));

        return redirect()->route('habits.index')->with('success', 'Habit created successfully.');
    }

    /**
     * Menampilkan form untuk mengedit habit yang ada.
     */
    public function edit($id)
    {
        $habit = Habit::findOrFail($id); // Ambil habit berdasarkan ID
        return view('habits.edit', compact('habit')); // Kirim data ke tampilan edit
    }

    /**
     * Memperbarui habit yang ada di dalam database.
     */
    public function update(Request $request, Habit $habit)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'frequency' => 'required|string|max:255', // Tambahkan batasan panjang
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Perbarui habit
        $habit->update($request->only(['name', 'frequency', 'start_date', 'end_date']));

        return redirect()->route('habits.index')->with('success', 'Habit updated successfully.');
    }

    /**
     * Menghapus habit dari database.
     */
    public function destroy($id)
    {
        $habit = Habit::findOrFail($id); // Ambil habit berdasarkan ID
        $habit->delete(); // Hapus habit
        return redirect()->route('habits.index')->with('success', 'Habit berhasil dihapus.'); // Kembali ke daftar habit
    }
}