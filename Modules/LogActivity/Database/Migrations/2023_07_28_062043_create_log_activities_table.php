<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\LogActivity\Entities\V1\LogActivity\LogActivityFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('log_activities', function (Blueprint $table) {
            $table->id();
            $table->string(LogActivityFields::IP_ADDRESS)->nullable();
            $table->string(LogActivityFields::URL)->nullable();
            $table->string(LogActivityFields::ACTION)->nullable();
            $table->unsignedBigInteger(LogActivityFields::USER_ID)->nullable();
            $table->string(LogActivityFields::DEVICE)->nullable();
            $table->string(LogActivityFields::PLATFORM)->nullable();
            $table->string(LogActivityFields::BROWSER)->nullable();
            $table->boolean(LogActivityFields::IS_MOBILE);
            $table->boolean(LogActivityFields::IS_DESKTOP);
            $table->boolean(LogActivityFields::IS_TABLET);
            $table->dateTime(LogActivityFields::DATE_TIME);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('log_activities');
    }
};
