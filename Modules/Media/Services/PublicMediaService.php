<?php

namespace Modules\Media\Services;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Media\Fields\DiskFields;
use Modules\Media\Fields\MediaFields;

class PublicMediaService extends DefaultMediaService
{
    /**
     * The disk to use for saving files.
     *
     * @var string
     */
    private string $disk = DiskFields::PUBLIC;

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
        Storage::disk($this->disk)->putFileAs($storePath, $file, $fileName);
    }
}
