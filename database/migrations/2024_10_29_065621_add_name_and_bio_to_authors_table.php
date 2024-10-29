<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameAndBioToAuthorsTable extends Migration
{
    public function up()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->string('name')->after('id'); // Menambahkan kolom name
            $table->text('bio')->nullable()->after('name'); // Menambahkan kolom bio
        });
    }

    public function down()
    {
        Schema::table('authors', function (Blueprint $table) {
            $table->dropColumn(['name', 'bio']); // Menghapus kolom name dan bio jika rollback
        });
    }
}
