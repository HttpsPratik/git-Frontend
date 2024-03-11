<?php

namespace App\Repository;

use App\Models\Attachment;
use App\Repository\Interfaces\AttachmentRepositoryInterface;

class AttachmentRepository extends BaseRepository implements AttachmentRepositoryInterface
{
    public function __construct(Attachment $model)
    {
        parent::__construct($model);
    }
}
