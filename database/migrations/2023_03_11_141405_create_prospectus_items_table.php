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
        Schema::create('prospectus_items', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_item')->nullable();
            $table->integer('items_in_store')->nullable();
            $table->integer('items_in_use')->nullable();
            $table->integer('items_unusable')->nullable();
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
        Schema::dropIfExists('prospectus_items');
    }
};
