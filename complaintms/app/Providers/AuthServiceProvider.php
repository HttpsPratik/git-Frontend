<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Assign;
use App\Models\Ticket;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    private array $role_hierarchy = ['admin', 'admin-assistant', 'department-head', 'staff'];
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        $this->registerPolicies();

        Gate::define('authorized', fn(Admin $admin, $role) => array_search($role, $this->role_hierarchy) >= array_search($admin->role->role, $this->role_hierarchy));
        Gate::define('publish-ticket', fn(Admin $admin) => array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin-assistant', $this->role_hierarchy));
        Gate::define('ticket-query', fn(Admin $admin) => array_search($admin->role->role, $this->role_hierarchy) > array_search('admin-assistant', $this->role_hierarchy));
        Gate::define('open-ticket', fn(Admin $admin) => array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin-assistant', $this->role_hierarchy));
        Gate::define('admin-management', fn(Admin $admin) => array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin', $this->role_hierarchy));
        Gate::define('setting', fn(Admin $admin) => array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin', $this->role_hierarchy));
        Gate::define('ticket-permission', function (Admin $admin, $ticket_id) {
            if(array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin-assistant', $this->role_hierarchy)){
                if(Ticket::select(['id', 'status'])->where('id', $ticket_id)->first()->status == 'processing'){
                    $assignDepartment = Assign::select(['id', 'department_id'])
                        ->where('ticket_id', $ticket_id)
                        ->orderBy('created_at', 'desc')
                        ->first()
                        ->department_id;
                    return $assignDepartment == $admin->department_id;
                }
                return true;
            } else {
                $AssignDepartment = Assign::select(['id', 'department_id'])
                    ->where('ticket_id', $ticket_id)
                    ->orderBy('created_at', 'desc')
                    ->first()
                    ->department_id;
                return $AssignDepartment == $admin->department_id;
            }
        });
        Gate::define('ticket-view-permission', function (Admin $admin, $ticket_id) {
            if(array_search($admin->role->role, $this->role_hierarchy) <= array_search('admin-assistant', $this->role_hierarchy)){
                return true;
            } else {
                $assignDepartment = Assign::select(['id', 'department_id'])
                    ->where('ticket_id', $ticket_id)
                    ->orderBy('created_at', 'desc')
                    ->first()
                    ->department_id;
                return $assignDepartment == $admin->department_id;
            }
        });

    }

}
