<?php

namespace Modules\Media\Services\V1;

use Illuminate\Http\UploadedFile;
use Modules\Media\Fields\V1\DiskFields;

class MediaProcessor
{
    /**
     * Process an uploaded file and save it.
     *
     * @param UploadedFile $file
     * @param string $disk
     * @return array
     */
    public function processUploadFile(UploadedFile $file, string $disk = DiskFields::PUBLIC): array
    {
        return match ($disk) {
            DiskFields::PUBLIC => (new PublicMediaService())->saveFile($file),
            DiskFields::FTP    => (new FTPMediaService())->saveFile($file),
        };
    }

    /**
     * Process multiple uploaded files and save them.
     *
     * @param array $files
     * @param string $disk
     * @return array
     */
    public function processUploadFiles(array $files, string $disk = DiskFields::PUBLIC): array
    {
        return match ($disk) {
            DiskFields::PUBLIC => (new PublicMediaService())->saveFiles($files),
            DiskFields::FTP    => (new FTPMediaService())->saveFiles($files),
        };
    }
}
