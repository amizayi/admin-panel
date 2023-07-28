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
            $table->unsignedBigInteger(LogFields::USER_ID);
            $table->string(LogFields::ACTIVITY);
            $table->text(LogFields::DESCRIPTION)->nullable();
            $table->string(LogFields::IP_ADDRESS)->nullable();
            $table->text(LogFields::USER_AGENT)->nullable();
            $table->string(LogFields::DEVICE)->nullable();
            $table->string(LogFields::PLATFORM)->nullable();
            $table->string(LogFields::BROWSER)->nullable();
            $table->string(LogFields::BROWSER_VERSION)->nullable();
            $table->boolean(LogFields::IS_MOBILE)->default(false);
            $table->boolean(LogFields::IS_DESKTOP)->default(false);
            $table->boolean(LogFields::IS_TABLET)->default(false);
            $table->text(LogFields::LANGUAGES)->nullable();
            $table->boolean(LogFields::IS_ROBOT)->default(false);
            $table->string(LogFields::ROBOT_NAME)->nullable();
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
