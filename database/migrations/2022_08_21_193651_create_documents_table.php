<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description')->nullable();
            $table->integer('type')->default(0);
            $table->string('images', 10000)->default('[]');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('etablissement_id');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('search_count')->default(0);
            $table->bigInteger('click_count')->default(0);
            $table->string('prof')->nullable();
            $table->integer('status')->default(0);
            $table->integer('state')->default(0);
            $table->unsignedDouble('price')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
