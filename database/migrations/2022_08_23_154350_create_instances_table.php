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
        Schema::create('instances', function (Blueprint $table) {
            $table->id("id");
            $table->string("numero_serie")->unique();
            $table->boolean("utilisable");
            $table->string("status");
            $table->unsignedBigInteger("article_id");
            $table->unsignedBigInteger("location_courante");

            $table->foreign("article_id")->references("id")->on("articles")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("location_courante")->references("id")->on("entrepots")->onDelete("cascade")->onUpdate("cascade");
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instances');
    }
};
