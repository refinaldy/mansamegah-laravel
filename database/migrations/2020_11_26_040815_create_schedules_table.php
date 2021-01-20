<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id'); // fk kelas
            $table->enum('semester', ['genap','ganjil']); // semester
            $table->integer('day_id'); // hari
            $table->integer('subject_id'); // fk mata pelajaran
            $table->bigInteger('teacher_id'); // fk guru
            $table->integer('time_interval_id'); // fk waktu
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
