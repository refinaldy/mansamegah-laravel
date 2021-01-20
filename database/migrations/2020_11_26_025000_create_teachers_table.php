<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nip', 40); // nomor induk pegawai
            $table->string('full_name'); // nama lengkap
            $table->string('teacher_image')->nullable(); // foto guru
            $table->enum('gender',['Laki-laki','Perempuan']); // jenis kelamin guru
            $table->string('birth_place')->nullable(); // tempat lahir
            $table->date('birth_date')->nullable(); // tanggal lahir
            $table->string('education')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('position')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('teachers');
    }
}
