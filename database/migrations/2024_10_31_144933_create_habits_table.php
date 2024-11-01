<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitsTable extends Migration
{
    public function up()
    {
        Schema::create('habits', function (Blueprint $table) {
            $table->id(); // Ini akan menjadi primary key secara default
            // Hapus kolom user_id
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Hapus ini
            $table->string('name'); // Nama habit
            $table->string('frequency'); // Frekuensi habit
            $table->date('start_date'); // Tanggal mulai
            $table->date('end_date'); // Tanggal selesai
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('habits');
    }
}

