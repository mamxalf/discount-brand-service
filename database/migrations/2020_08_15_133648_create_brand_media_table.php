<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrandMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand_media', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_brand')->unsigned();
            $table->string('logo');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign("id_brand")->references("id")->on("brands")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brand_media');
    }
}
