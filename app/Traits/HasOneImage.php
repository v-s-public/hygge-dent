<?php

namespace App\Traits;

use App\Facades\Admin\ImagesService;

trait HasOneImage
{
    /**
     * Get Entity Image
     *
     * @return string
     */
    public function getImage() : string
    {
        return ImagesService::getOne($this->diskName, $this->image);
    }

    /**
     * Delete Entity Image
     */
    public function deleteImage()
    {
        ImagesService::deleteOne($this->diskName, $this->image);
    }
}
