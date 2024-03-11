<?php

namespace App\Repository\Interfaces;

interface MediaRepositoryInterface
{
    public function getMediaCount($fiscal_year_id = null);
}
