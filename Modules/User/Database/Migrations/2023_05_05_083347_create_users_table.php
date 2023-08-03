<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Enums\V1\UserStatus;

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
            $table->string(UserFields::USERNAME)->unique();
            $table->string(UserFields::FIRST_NAME)->nullable();
            $table->string(UserFields::LAST_NAME)->nullable();
            $table->string(UserFields::FULL_NAME)->nullable();
            $table->string(UserFields::MOBILE)->unique();
            $table->string(UserFields::EMAIL)->unique();
            $table->timestamp(UserFields::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserFields::PASSWORD);
            $table->tinyInteger(UserFields::STATUS)->default(UserStatus::INACTIVE);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
