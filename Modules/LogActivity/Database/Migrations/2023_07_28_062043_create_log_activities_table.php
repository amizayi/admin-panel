<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\LogActivity\Fields\LogFields;

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
            $table->string(LogFields::IP_ADDRESS);
            $table->string(LogFields::URL);
            $table->string(LogFields::ACTION);
            $table->unsignedBigInteger(LogFields::USER_ID);
            $table->string(LogFields::DEVICE);
            $table->string(LogFields::PLATFORM);
            $table->string(LogFields::BROWSER);
            $table->boolean(LogFields::IS_MOBILE);
            $table->boolean(LogFields::IS_DESKTOP);
            $table->boolean(LogFields::IS_TABLET);
            $table->dateTime(LogFields::DATE_TIME);
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
