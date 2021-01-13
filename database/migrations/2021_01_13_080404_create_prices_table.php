<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_positions', function (Blueprint $table) {
            $table->increments('price_position_id');
            $table->text('price_position_name');
            $table->unsignedInteger('price');
            $table->unsignedInteger('price_section_id');
            $table->timestamps();

            $table->foreign('price_section_id')
                ->on('price_sections')
                ->references('price_section_id')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
