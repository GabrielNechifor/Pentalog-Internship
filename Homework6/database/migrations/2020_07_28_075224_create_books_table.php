<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type');
            $table->smallInteger('volume');
            $table->smallInteger('copies_number');
            $table->smallInteger('publish_year');
            $table->string('cover_link');
            $table->timestamps();

            $table->foreignId('author_id')->constrained();
            $table->foreignId('publisher_id')->constrained();
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
}
