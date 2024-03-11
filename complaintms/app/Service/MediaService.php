<?php

namespace App\Service;

use App\Repository\Interfaces\MediaRepositoryInterface;


class MediaService
{
    public function __construct(private MediaRepositoryInterface $mediaRepository)
    {
    }

    public function getMediaCount($fiscal_year_id = null)
    {
        return $this->mediaRepository->getMediaCount($fiscal_year_id);
    }

    public function getMediumId($name){
        return $this->mediaRepository->getMediumId($name);
    }

}
