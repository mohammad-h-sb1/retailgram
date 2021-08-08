<?php

use App\Enums\CustomerClubLevel;
use App\Models\Customer;
use App\Models\CustomerClub;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerClubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('type')->unique();
            $table->integer('rating')->unique();
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
        Schema::dropIfExists('customer_clubs');
    }
}
