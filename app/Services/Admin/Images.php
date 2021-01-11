<?php

namespace App\Services\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Images
{
    /**
     * Save on file to disk
     *
     * @param string $disk
     * @param UploadedFile $file
     * @return string
     */
    public function saveOne(string $disk, UploadedFile $file) : string
    {
        $imageName = $this->generateFileName($disk, $file);
        Storage::disk($disk)->put($imageName, file_get_contents($file));
        return $imageName;
    }

    public function getOne(string $disk, string $fileName) : string
    {
        return Storage::disk($disk)->url($fileName);
    }

    /**
     * Generate File Name
     *
     * @param string $disk
     * @param UploadedFile $file
     * @return string
     */
    private function generateFileName(string $disk, UploadedFile $file) : string
    {
        return 'employee-' . time() . '.' . $file->extension();
    }
}
