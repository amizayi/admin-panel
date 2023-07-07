<?php

namespace Modules\Media\Services;

use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Modules\Media\Fields\MediaFields;

class BaseMediaService
{
    /**
     * @var array $allowedImageExtensions The array of allowed image file extensions.
     */
    public array $allowedImageExtensions  = ['jpg', 'jpeg', 'png', 'gif', 'bmp'];

    /**
     * The maximum width for the resized image.
     *
     * @var int
     */
    public int $maxWidth = 1200;

    /**
     * The maximum height for the resized image.
     *
     * @var int
     */
    public int $maxHeight = 800;

    /**
     * The compression quality for the image.
     *
     * @var int
     */
    public int $compressionQuality = 80;

    /**
     * Generate a full path file with the current date and time.
     *
     * @param string $extension
     * @return string
     */
    public function generateName(string $extension = 'jpg'): string
    {
        $dateTime = Carbon::now();
        $fileName = $dateTime->format('YmdHisu');

        return sprintf("%s.$extension", $fileName);
    }

    /**
     * Get details of the uploaded file.
     *
     * @param UploadedFile $file
     * @param string|null $disk
     * @return array
     */
    public function fileDetails(UploadedFile $file,?string $disk): array
    {
        $extension    = $file->getClientOriginalExtension();
        $fileName     = $this->generateName($extension);
        $originalName = $file->getClientOriginalName();
        $mimeType     = $file->getMimeType();
        $size         = $file->getSize();
        $creatorId    = auth()->user()->id ?? null;

        return [
            MediaFields::FILE_NAME     => $fileName,
            MediaFields::ORIGINAL_NAME => $originalName,
            MediaFields::EXTENSION     => $extension,
            MediaFields::MIMETYPE      => $mimeType,
            MediaFields::SIZE          => $size,
            MediaFields::DISK          => $disk,
            MediaFields::CREATOR_ID    => $creatorId,
        ];
    }
}
