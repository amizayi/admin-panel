<?php

namespace Modules\Media\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Fields\DiskFields;
use Modules\Media\Fields\MediaFields;

class PublicMediaService extends DefaultMediaService
{
    private string $disk = DiskFields::PUBLIC;

    public function saveFile(UploadedFile $file)
    {
        $details   = $this->fileDetails($file, $this->disk);
        $fileName  = $details[MediaFields::FILE_NAME];
        $storePath = convertToFormattedPath($fileName);

        Storage::disk($this->disk)->putFileAs($storePath, $file, $fileName);

        return $details;
    }
}
