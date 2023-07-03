<?php

namespace Modules\Media\Services;

use Carbon\Carbon;

class DefaultMediaService
{
    /**
     * Generate a filename with the current date and time.
     *
     * @return string
     */
    public function generateFilename(): string
    {
        $dateTime   = Carbon::now();
        $folderName = $this->generateDirectoryPath($dateTime);

        return sprintf('%s/%s.jpg', $folderName, $dateTime->format('YmdHisu'));
    }

    /**
     * Generate a directory path based on the provided or current date and time.
     *
     * @param Carbon|null $dateTime
     * @return string
     */
    public function generateDirectoryPath(?Carbon $dateTime): string
    {
        $dateTime = $dateTime ?? Carbon::now();

        return $dateTime->format('Y/m/d/H');
    }
}
