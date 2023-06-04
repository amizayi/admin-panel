<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\User\Fields\UserFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string(UserFields::USERNAME);
            $table->string(UserFields::FIRST_NAME)->nullable();
            $table->string(UserFields::LAST_NAME)->nullable();
            $table->string(UserFields::FULL_NAME)->nullable();
            $table->string(UserFields::EMAIL)->unique();
            $table->timestamp(UserFields::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserFields::PASSWORD);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
