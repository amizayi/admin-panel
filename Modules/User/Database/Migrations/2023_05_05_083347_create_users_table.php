<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\User\MCF\UserMCF;

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
            $table->string(UserMCF::USERNAME);
            $table->string(UserMCF::FIRST_NAME)->nullable();
            $table->string(UserMCF::LAST_NAME)->nullable();
            $table->string(UserMCF::FULL_NAME)->nullable();
            $table->string(UserMCF::EMAIL)->unique();
            $table->timestamp(UserMCF::EMAIL_VERIFIED_AT)->nullable();
            $table->string(UserMCF::PASSWORD);
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
