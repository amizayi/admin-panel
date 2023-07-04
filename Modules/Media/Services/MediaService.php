<?php

namespace Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Modules\Media\Fields\DiskFields;

class  MediaService
{
    public function processUploadedFile(UploadedFile $file, string $disk = DiskFields::PUBLIC)
    {
        return match ($disk) {
            DiskFields::PUBLIC => (new PublicMediaService())->saveFile($file)
        };
    }
}
