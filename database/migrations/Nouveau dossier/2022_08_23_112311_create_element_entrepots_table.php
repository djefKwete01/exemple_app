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
        Schema::create('element_entrepot', function (Blueprint $table) {
            $table->id("id");
            $table->unsignedBigInteger("element_id")->nullable();
            $table->unsignedBigInteger("entrepot_id")->nullable();
            $table->foreign("element_id")->references("id")->on("elements")->onDelete("SET NULL")->onUpdate("SET NULL");
            $table->foreign("entrepot_id")->references("id")->on("entrepots")->onDelete("SET NULL")->onUpdate("SET NULL");
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
        Schema::dropIfExists('element_entrepots');
    }
};
