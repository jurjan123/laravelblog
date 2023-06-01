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
        Schema::create("orders", function(Blueprint $table){
            $table->id();
            $table->foreignid("user_id")->references("id")->on("users")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->decimal("total_exc");
            $table->decimal("vat");
            $table->decimal("total_inc");
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
        Schema::dropIfExists("orders");
    }
};
