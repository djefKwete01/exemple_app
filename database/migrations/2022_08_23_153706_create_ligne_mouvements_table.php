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
        Schema::create('ligne_mouvements', function (Blueprint $table) {
            $table->id("id");
            $table->integer("quantite");
            $table->unsignedBigInteger("mouvement_id");
            $table->unsignedBigInteger("article_id");
            $table->foreign("mouvement_id")->references("id")->on("mouvements")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ligne_mouvements');
    }
};
