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
        Schema::create("order_details", function(Blueprint $table){
            $table->id();
            $table->foreignid("order_id")->references("id")->on("orders")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->foreignid("product_id")->references("id")->on("products")->cascadeOnUpdate()->cascadeOnDelete()->nullable();
            $table->string("product_name");
            $table->decimal("product_price");
            $table->string("product_image");
            $table->integer("quantity");
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
        Schema::dropIfExists("order_details");
    }
};
