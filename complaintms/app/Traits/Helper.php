<?php

namespace App\Traits;

use SplFileInfo;

trait Helper
{
    protected function isValidFile($file)
    {
        return $file instanceof SplFileInfo && $file->getPath() !== '';
    }

    public function arrayHasFile($files)
    {
        foreach ($files as $file) {
            if ($this->isValidFile($file)) {
                return true;
            }
        }

        return false;
    }
}
