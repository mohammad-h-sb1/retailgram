<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_solds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('center_shop_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('city_id');
            $table->string('count');
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('center_shop_id')
                ->references('id')
                ->on('product_solds')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('province_id')
                ->references('id')
                ->on('provinces')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_solds');
    }
}
