<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
			$table->string('name')->nullable();
			$table->string('country')->nullable();
			$table->string('price')->nullable();
			$table->string('date')->nullable();
			$table->boolean('is_video')->default(0);
			$table->string('video_link')->nullable();
			$table->string('pdf_name')->nullable();
			$table->longText('description')->nullable();
			$table->integer('order')->default(0)->nullable();
			$table->boolean('featured')->default(0);
			$table->boolean('published')->default(0);
			
			$table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			
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
        Schema::dropIfExists('packages');
    }
}
