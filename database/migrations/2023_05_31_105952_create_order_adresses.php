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
        Schema::create("order_adresses", function(Blueprint $table){
            $table->id();
            $table->foreignid("order_id")->references("id")->on("orders")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string("type");
            $table->string("first_name");
            $table->string("last_name");
            $table->string("street");
            $table->integer("house_number");
            $table->string("postal_code");
            $table->string("city");
            $table->integer("phone_number");
            $table->string("email_adress");
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
        Schema::dropIfExists("order_adresses");
    }
};
