<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Modules\Media\Fields\MediaFields;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->morphs(MediaFields::MORPH);
            $table->string(MediaFields::FILE_NAME);
            $table->string(MediaFields::ORIGINAL_NAME);
            $table->string(MediaFields::EXTENSION);
            $table->string(MediaFields::MIMETYPE);
            $table->unsignedBigInteger(MediaFields::SIZE);
            $table->string(MediaFields::DISK);
            $table->unsignedBigInteger(MediaFields::CREATOR_ID)->nullable();
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
        Schema::dropIfExists('media_files');
    }
};
