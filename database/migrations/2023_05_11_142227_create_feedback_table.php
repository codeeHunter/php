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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("text");
            $table->text("img");
            $table->integer("rating");
            $table->timestamps();

            $table->bigInteger("city_id")->nullable();
            $table->bigInteger("author_id")->nullable();

            $table->index("city_id", "city_feedback_idx");
            $table->index("author_id", "author_feedback_idx");

            $table->foreign("city_id", "city_feedback_fk")->on("cities")->references("id");
            $table->foreign("author_id", "author_feedback_fk")->on("users")->references("id");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};