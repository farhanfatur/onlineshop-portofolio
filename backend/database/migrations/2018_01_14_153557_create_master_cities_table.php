<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_cities', function (Blueprint $table) {
            $table->unsignedInteger("id")->primary();
            $table->unsignedInteger("master_province_id");
            $table->string("province_name");
            $table->string("type");
            $table->string("city_name");
            $table->integer("postal_code");

            $table->foreign("master_province_id")->references("id")->on("master_provinces")->onDelete("cascade");
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
        Schema::dropIfExists('master_cities');
    }
}
