<?php

namespace Modules\Media\Services;

use Illuminate\Support\Facades\Storage;
use Modules\Media\Fields\MediaFields;
use Intervention\Image\Facades\Image;
use Modules\Media\Fields\DiskFields;
use Illuminate\Http\UploadedFile;

class PublicMediaService extends DefaultMediaService
{
    /**
     * The disk to use for saving files.
     *
     * @var string
     */
    private string $disk = DiskFields::PUBLIC;
    /**
     * The maximum width for the resized image.
     *
     * @var int
     */
    private int $maxWidth = 1200;

    /**
     * The maximum height for the resized image.
     *
     * @var int
     */
    private int $maxHeight = 800;

    /**
     * The compression quality for the image.
     *
     * @var int
     */
    private int $compressionQuality = 80;

    /**
     * Save a single file.
     *
     * @param UploadedFile $file The file to save.
     * @return array The file details.
     */
    public function saveFile(UploadedFile $file): array
    {
        $details   = $this->fileDetails($file, $this->disk);
        $fileName  = $details[MediaFields::FILE_NAME];
        $storePath = convertToFormattedPath($fileName);

        $this->storeFile($file, $storePath, $fileName);

        return $details;
    }

    /**
     * Save multiple files.
     *
     * @param array $files An array of files to save.
     * @return array An array of file details for each saved file.
     */
    public function saveFiles(array $files): array
    {
        $fileDetails = [];

        foreach ($files as $file) {
            $details   = $this->fileDetails($file, $this->disk);
            $fileName  = $details[MediaFields::FILE_NAME];
            $storePath = convertToFormattedPath($fileName);

            $this->storeFile($file, $storePath, $fileName);

            $fileDetails[] = $details;
        }

        return $fileDetails;
    }

    /**
     * Store a file.
     *
     * @param UploadedFile $file The file to store.
     * @param string $storePath The path where the file should be stored.
     * @param string $fileName The filename to use.
     * @return void
     */
    protected function storeFile(UploadedFile $file, string $storePath, string $fileName): void
    {
        if (in_array($file->getClientOriginalExtension(), $this->allowedImageExtensions)) {
            $image = Image::make($file);

            // Resize the image if needed
            if ($image->width() > $this->maxWidth || $image->height() > $this->maxHeight) {
                $image->resize($this->maxWidth, $this->maxHeight, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            // Compress the image
            $image->encode($file->getClientOriginalExtension(), $this->compressionQuality);

            Storage::disk($this->disk)->put($storePath . $fileName, (string)$image);
        } else {
            Storage::disk($this->disk)->putFileAs($storePath, $file, $fileName);
        }
    }
}
