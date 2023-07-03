<?php

namespace Modules\Media\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;

class DefaultMediaService
{
    /**
     * Generate a full path file with the current date and time.
     *
     * @return string
     */
    public function generateFullPath(): string
    {
        $dateTime = Carbon::now();
        $dirPath  = $dateTime->format('Y/m/d/H');;
        $fileName = $dateTime->format('YmdHisu');

        return sprintf('%s/%s.jpg', $dirPath, $fileName);
    }

    /**
     * Get details of the uploaded file.
     *
     * @param UploadedFile $file
     * @return array
     */
    public function fileDetails(UploadedFile $file): array
    {
        $generatePath = $this->generateFullPath();
        $originalName = $file->getClientOriginalName();
        $mimeType     = $file->getMimeType();
        $extension    = $file->getClientOriginalExtension();
        $size         = $file->getSize();
        $creatorId    = auth()->user()->id ?? null;

        return [
            'file_name'     => getFileNameFromPath($generatePath), // get fileName from helper
            'original_name' => $originalName,
            'extension'     => $extension,
            'mimetype'      => $mimeType,
            'size'          => $size,
            'creator_id'    => $creatorId,
        ];
    }
}
