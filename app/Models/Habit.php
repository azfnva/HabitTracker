<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    use HasFactory;

    protected $table = 'habits'; // Nama tabel

    // Jika primary key adalah 'id', Anda tidak perlu mendefinisikannya
    // protected $primaryKey = 'habit_id'; // Hapus ini jika primary key adalah 'id'

    protected $fillable = [
        'name', // Nama habit
        'frequency', // Frekuensi habit
        'start_date', // Tanggal mulai
        'end_date', // Tanggal selesai
    ];
    
   
    // Jika tidak ada relasi ke User, Anda bisa menghapus metode ini
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}   //