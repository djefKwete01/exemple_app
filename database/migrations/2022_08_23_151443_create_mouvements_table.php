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
        Schema::create('mouvements', function (Blueprint $table) {
            $table->id("id");
            $table->string('status');
            $table->dateTime("date");
            $table->unsignedBigInteger("type_mouvement_id");
            $table->foreign("type_mouvement_id")->references("id")->on("type_mouvements")->onDelete("cascade")->onUpdate("cascade");
            
            $table->unsignedBigInteger("expediteur");
            $table->foreign("expediteur")->references("id")->on("entrepots")->onDelete("cascade")->onUpdate("cascade");
            
            $table->unsignedBigInteger("beneficiaire");
            $table->foreign("beneficiaire")->references("id")->on("entrepots")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mouvements');
    }
};
