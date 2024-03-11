<?php

namespace App\Providers;

use App\Repository\AnonymousTicketRepository;
use App\Repository\BaseRepository;
use App\Repository\Interfaces\AnonymousTicketRepositoryInterface;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Repository\AdminRepository;
use App\Repository\MediaRepository;
use App\Repository\AssignRepository;
use App\Repository\TicketRepository;
use App\Repository\ActivityRepository;
use App\Repository\CategoryRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\AttachmentRepository;
use App\Repository\DepartmentRepository;
use App\Repository\FiscalYearRepository;
use App\Repository\ConversationRepository;
use App\Repository\Interfaces\RoleRepositoryInterface;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\AdminRepositoryInterface;
use App\Repository\Interfaces\MediaRepositoryInterface;
use App\Repository\Interfaces\AssignRepositoryInterface;
use App\Repository\Interfaces\TicketRepositoryInterface;
use App\Repository\Interfaces\ActivityRepositoryInterface;
use App\Repository\Interfaces\CategoryRepositoryInterface;
use App\Repository\Interfaces\EloquentRepositoryInterface;
use App\Repository\Interfaces\AttachmentRepositoryInterface;
use App\Repository\Interfaces\DepartmentRepositoryInterface;
use App\Repository\Interfaces\FiscalYearRepositoryInterface;
use App\Repository\Interfaces\ConversationRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EloquentRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(DepartmentRepositoryInterface::class, DepartmentRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(FiscalYearRepositoryInterface::class, FiscalYearRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(AssignRepositoryInterface::class, AssignRepository::class);
        $this->app->bind(TicketRepositoryInterface::class, TicketRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ActivityRepositoryInterface::class, ActivityRepository::class);
        $this->app->bind(ConversationRepositoryInterface::class, ConversationRepository::class);
        $this->app->bind(AttachmentRepositoryInterface::class, AttachmentRepository::class);
        $this->app->bind(MediaRepositoryInterface::class, MediaRepository::class);
        $this->app->bind(AnonymousTicketRepositoryInterface::class, AnonymousTicketRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
