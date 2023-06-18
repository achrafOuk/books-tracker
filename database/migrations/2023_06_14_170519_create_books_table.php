<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // thumbneal, image,publication_year
        Schema::create('books', function (Blueprint $table) {
            $table->string('slug')->primary();
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->integer('publication_year');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
