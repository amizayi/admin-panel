<?php

namespace Modules\Media\Services\V1;

use Illuminate\Http\UploadedFile;
use Modules\Media\Fields\V1\DiskFields;

class FTPMediaService
{
    /**
     * The disk to use for saving files.
     *
     * @var string
     */
    private string $disk = DiskFields::FTP;

    public function saveFile(UploadedFile $file): array
    {
        return [];
    }

    public function saveFiles(array $files): array
    {
        return [];
    }
}
