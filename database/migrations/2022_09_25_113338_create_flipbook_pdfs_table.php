<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlipbookPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flipbook_pdfs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flipbook_id');
            $table->string('heading')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('pdf')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('btn_text')->nullable();
            $table->string('btn_show')->nullable();
            $table->string('mime_type')->nullable();
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
        Schema::dropIfExists('flipbook_pdfs');
    }
}
