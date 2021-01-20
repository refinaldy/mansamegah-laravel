<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis', 25); //nomor induk siswa
            $table->string('nisn', 25); // nomor induk siswa nasional
            $table->string('first_name', 30); // nama depan
            $table->string('second_name', 30)->nullable(); // nama belakang
            $table->string('student_image')->nullable(); // foto siswa
            $table->enum('gender', ['L','P']); //jenis kelamin siswa
            $table->text('address')->nullable(); // alamat
            $table->date('birth_date')->nullable(); // tanggal lahir
            $table->string('birth_place', 25)->nullable(); // tempat lahir
            $table->string('origin_school', 30)->nullable(); // sekolah asal
            $table->string('accepted_to_class',2); // diterima di kelas
            $table->string('fathers_name', 30)->nullable(); // nama ayah
            $table->string('mothers_name', 30)->nullable(); // nama ibu 
            $table->string('fathers_job', 25)->nullable(); // pekerjaan ayah
            $table->string('mothers_job', 25)->nullable();  // pekerjaan ibu
            $table->string('fathers_phone_number', 12)->nullable(); // no telepon ayah
            $table->string('mothers_phone_number', 12)->nullable(); // no telepon ibu
            $table->text('fathers_address')->nullable(); // alamat ayah
            $table->text('mothers_address')->nullable(); // alamat ibu
            $table->string('caregivers_name', 30)->nullable(); // nama wali 
            $table->string('caregivers_job', 25)->nullable(); // pekerjaan wali
            $table->string('caregivers_phone_number',12)->nullable(); // no telepon wali
            $table->text('caregivers_address')->nullable(); // alamat wali
            $table->unsignedBigInteger('academic_year_id');
            $table->foreign('academic_year_id')->references('id')->on('academic_years')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
