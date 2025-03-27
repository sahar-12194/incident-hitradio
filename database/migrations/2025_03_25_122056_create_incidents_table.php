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
        Schema::create('incidents', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->time('heure_started');
            $table->time('heure_end');
            $table->string('type_panne');
            $table->string('action');
            $table->string('inpact');
            $table->text('obsevation')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignUuid('user_id')->constrained('users');
            $table->foreignUuid('entity_id')->constrained('entities');
            $table->softDeletes();
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
        Schema::dropIfExists('incidents');
    }
};
