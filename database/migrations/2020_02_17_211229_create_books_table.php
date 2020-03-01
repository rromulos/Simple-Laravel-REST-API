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
            $table->bigIncrements('id');
            $table->string('title',100)->comment('title of the book');
            $table->string('author',50)->comment('author of the book');
            $table->string('ISBN',20)->comment('ISBN of the book');
            $table->integer('year')->unsigned()->comment('year of publication');
            $table->integer('number_pages')->unsigned()->comment('number of pages');
            $table->decimal('price',8,2)->comment('Price of the book');
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
        Schema::dropIfExists('books');
    }
}
