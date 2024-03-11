<?php

namespace App\Service;

use App\Repository\Interfaces\UserRepositoryInterface;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function getAllUser($request){
        return $this->userRepository->getAllUser($request);
    }

}
