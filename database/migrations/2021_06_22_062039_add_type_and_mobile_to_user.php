<?php

use App\Enums\CustomerClubLevel;
use App\Enums\GenderType;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeAndMobileToUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->after('id')->default(1);
            $table->string('mobile')->unique()->after('name');
            $table->enum('type',UserType::TYPES)->default(UserType::TYPE_USER)->after('email');
            $table->enum('gender',GenderType::GENDER)->default(GenderType::GENDER_WOMAN)->after('type');
            $table->string('rating')->default(0)->after('gender');
            $table->string('api_token')->unique()->after('rating')->nullable();
            $table->string('state')->after('api_token')->nullable();
            $table->unsignedBigInteger('province_id')->after('id')->nullable();
            $table->unsignedBigInteger('city_id')->after('province_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('type');
            $table->dropColumn('gender');
            $table->dropColumn('mobile');
            $table->dropColumn('customer_id');
        });
    }
}
