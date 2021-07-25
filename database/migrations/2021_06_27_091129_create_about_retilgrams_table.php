<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutRetilgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_retilgrams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->text('work_retilgrams')->nullable();
            $table->text('blog_retilgrams')->nullable();
            $table->text('about_retilgrams')->nullable();
            $table->text('training_and_guidance')->nullable();

            $table->text('product_return')->nullable();
            $table->text('terms_of_use')->nullable();
            $table->text('privacy')->nullable();
            $table->text('bug')->nullable();


            $table->text('about_order_registration')->default(null);
            $table->text('about_send_product')->default(null);
            $table->text('about_payment')->default(null);
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
        Schema::dropIfExists('about_retilgrams');
    }
}
