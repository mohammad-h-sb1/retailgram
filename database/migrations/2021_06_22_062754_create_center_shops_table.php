<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCenterShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('center_shops', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');//این ایدی یوزر هست نه ای کسی کع درتش کرده
            $table->string('name');
            $table->string('central_address');
            $table->string('central_phone')->unique();
            $table->text('description')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::dropIfExists('center_shops');
    }
}
