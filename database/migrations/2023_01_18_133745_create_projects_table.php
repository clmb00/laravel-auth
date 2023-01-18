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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 128);
            $table->string('slug', 132)->unique();
            $table->string('client_name', 64);
            $table->text('summary');
            $table->string('cover_image')->nullable()->default('https://cdn1.iconfinder.com/data/icons/images-image-files-1/24/photo_photography_image_picture_no_disable-512.png');
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
        Schema::dropIfExists('projects');
    }
};
