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
        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger("category_id")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->foreign("category_id")->after("id")->references("id")->on("categories")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreign("user_id")->after("id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
