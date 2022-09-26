<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToFlipBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flip_books', function (Blueprint $table) {
            $table->string('section1_heading')->nullable();
            $table->string('section1_title')->nullable();
            $table->text('section1_description')->nullable();
            $table->string('pdf')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_show')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flip_books', function (Blueprint $table) {
            //
        });
    }
}
