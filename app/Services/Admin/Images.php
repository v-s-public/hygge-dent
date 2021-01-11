<?php

namespace App\Services\Admin;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Images
{
    /**
     * Save one image to disk
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

    /**
     * Get one image from disk
     *
     * @param string $disk
     * @param string $fileName
     * @return string
     */
    public function getOne(string $disk, string $fileName) : string
    {
        return Storage::disk($disk)->url($fileName);
    }

    /**
     * Delete one image from disk
     *
     * @param string $disk
     * @param string $fileName
     */
    public function deleteOne(string $disk, string $fileName)
    {
        Storage::disk($disk)->delete($fileName);
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
