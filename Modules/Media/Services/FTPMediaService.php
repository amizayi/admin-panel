<?php

namespace Modules\Media\Services;

use Illuminate\Http\UploadedFile;
use Modules\Media\Fields\DiskFields;

class FTPMediaService
{
    public function saveFile(UploadedFile $file): array
    {
        return [];
    }

    public function saveFiles(array $files): array
    {
        return [];
    }
}
