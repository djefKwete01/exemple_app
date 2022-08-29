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
        Schema::create('entite_admins', function (Blueprint $table) {
            $table->id("id");
            $table->string("nom")->unique();
            $table->unsignedBigInteger("type_entite_admin");
            $table->foreign("type_entite_admin")->references("id")->on("type_entite_admins")->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('entite_admins');
    }
};
