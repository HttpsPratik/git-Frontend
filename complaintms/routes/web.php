<?php


use App\Http\Controllers\ActivityController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FiscalYearController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Frontend Start*/


Route::get('/', [PageController::class, 'index']);
Route::get('/gunaso/detail/{id}', [PageController::class, 'single']);
Route::get('/gunaso/search', [PageController::class, 'search']);
Route::get('/gunaso/register', [PageController::class, 'register']);
Route::post('/gunaso/register/save', [PageController::class, 'store']);
Route::get('/faq', [PageController::class, 'faq']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/storage/*', [PageController::class, 'index']);
Route::get('/gunaso/reload-captcha', [UserController::class, 'reloadCaptchaUser']);

//user
Route::middleware('auth:web')->get('/user-profile', [UserProfileController::class, 'index']);
Route::middleware('auth:web')->get('/user-tickets', [PageController::class, 'userTickets']);
Route::middleware('auth:web')->get('/user-ticket/{ticket_number}', [PageController::class, 'userTicketDetails']);
Route::middleware('auth:web')->put('/user/name-update', [UserProfileController::class, 'nameUpdate']);
Route::middleware('auth:web')->put('/user/email-update', [UserProfileController::class, 'emailUpdate']);

//category
Route::get('/category-name', [CategoryController::class, 'allCategoryName']);

//anonymous ticket
Route::middleware('throttle:8,1')->post('/gunaso/search',[PageController::class, 'searchTicket']);

/*Frontend End*/


/*dashboard start*/

//captcha
Route::get('/dashboard/reload-captcha', [AdminController::class, 'reloadCaptchaAdmin']);

//signed route attachment
Route::middleware(['temporarySigned'])
    ->get('/resource/attachment/{file_path_name}', [AttachmentController::class, 'shareResourceAttachment'])
    ->name('shareAttachment');
Route::middleware(['temporarySigned'])
    ->get('/resource/attachment-thumbnail/{file_path_name}', [AttachmentController::class, 'shareResourceAttachmentThumbnail'])
    ->name('shareAttachmentThumbnail');

//api for chart js
Route::get('dashboard/medium-count', [DashboardController::class, 'mediumCount']);
Route::get('dashboard/categories-count', [DashboardController::class, 'categoryCount']);
Route::get('dashboard/departments-count', [DashboardController::class, 'departmentCount']);

//route groups
Route::group(['middleware' => ['auth:admin', 'throttle:120,1'], 'prefix' => 'dashboard'], function () {

    //admin profile
    route::get('/admin/profile', function () {
        return view('dashboard.auth.profile');
    });

    //reports
    Route::get('/reports/{fiscal_year_id?}', [ReportController::class, 'viewReport']);
    Route::get('/report/medium-count/{fiscal_year_id?}', [ReportController::class, 'mediumCount']);
    Route::get('/report/categories-count/{fiscal_year_id?}', [ReportController::class, 'categoryCount']);
    Route::get('/report/departments-count/{fiscal_year_id?}', [ReportController::class, 'departmentCount']);

    //dashboard home
    Route::get('/', [DashboardController::class, 'index']);

    //error page
    Route::get('/errors', function () {
        return view('dashboard.pages.errors');
    });

    //dashboard notification
    Route::get('/notifications', [NotificationController::class, 'allNotification']);
    Route::put('/notification/mark/{notification_id}', [NotificationController::class, 'markNotification']);
    Route::get('/notification/unread', [NotificationController::class, 'unreadNotification']);
    Route::get('/notification/read', [NotificationController::class, 'readNotification']);
    Route::get('/notification/unread/count', [NotificationController::class, 'unreadNotificationCount']);
    Route::get('/notification/mark-all', [NotificationController::class, 'markAllNotification']);

    //admins
    Route::middleware(['role:admin'])->get('/admins', [AdminController::class, 'index']);
    Route::middleware(['role:admin'])->post('/admin/save', [AdminController::class, 'store']);
    Route::middleware(['role:admin'])->put('/admin/name-update', [AdminController::class, 'nameUpdate']);
    Route::middleware(['role:admin'])->put('/admin/email-update', [AdminController::class, 'emailUpdate']);
    Route::middleware(['role:admin'])->put('/admin/password-update', [AdminController::class, 'passwordUpdate']);
    Route::middleware(['role:admin'])->put('/admin/role-update', [AdminController::class, 'roleUpdate']);
    Route::middleware(['role:admin'])->put('/admin/department-update', [AdminController::class, 'departmentUpdate']);
    Route::middleware(['role:admin'])->delete('/admin/delete/{admin_id}', [AdminController::class, 'destroy']);

    //users
    Route::middleware(['role:admin-assistant'])->get('/users', [UserController::class, 'allUser']);

    //roles
    Route::middleware(['role:admin'])->get('/role-name', [RoleController::class, 'allRoleName']);
    Route::middleware(['role:admin'])->get('/roles', [RoleController::class, 'index']);
    Route::middleware(['role:admin'])->post('/role/save', [RoleController::class, 'store']);
    Route::middleware(['role:admin'])->put('/role/update', [RoleController::class, 'update']);
    Route::middleware(['role:admin'])->delete('/role/delete/{role_id}', [RoleController::class, 'destroy']);

    //department
    Route::middleware(['role:staff'])->get('/department-name', [DepartmentController::class, 'allDepartmentName']);
    Route::middleware(['role:staff'])->get('/department-ticket-forward', [DepartmentController::class, 'ticketForwardDepartments']);
    Route::middleware(['role:staff'])->get('/departments', [DepartmentController::class, 'index']);
    Route::middleware(['role:admin'])->post('/department/save', [DepartmentController::class, 'store']);
    Route::middleware(['role:admin'])->put('/department/update', [DepartmentController::class, 'update']);
    Route::middleware(['role:admin'])->delete('/department/delete/{department_id}', [DepartmentController::class, 'destroy']);

    //fiscal-year
    Route::middleware(['role:admin'])->get('/fiscal-years', [FiscalYearController::class, 'index']);
    Route::middleware(['role:staff'])->get('/all-fiscal-years', [FiscalYearController::class, 'getAllFiscalYear']);
    Route::middleware(['role:admin'])->post('/fiscal-year/save', [FiscalYearController::class, 'store']);
    Route::middleware(['role:admin'])->put('/fiscal-year/update', [FiscalYearController::class, 'update']);
    Route::middleware(['role:admin'])->delete('/fiscal-year/delete/{fiscal_year_id}', [FiscalYearController::class, 'destroy']);

    //categories
    Route::middleware(['role:staff'])->get('/categories', [CategoryController::class, 'index']);
    Route::middleware(['role:staff'])->get('/category-name', [CategoryController::class, 'allCategoryName']);
    Route::middleware(['role:admin-assistant'])->post('/category/save', [CategoryController::class, 'store']);
    Route::middleware(['role:admin-assistant'])->put('/category/update', [CategoryController::class, 'update']);
    Route::middleware(['role:admin-assistant'])->delete('/category/delete/{category_id}', [CategoryController::class, 'destroy']);

    //activities
    Route::middleware(['role:admin'])->get('/activities', [ActivityController::class, 'index']);

    //ticket
    Route::controller(TicketController::class)->prefix('/ticket')->group(function () {

        Route::middleware(['role:staff'])->post('/view-permission', 'ticketViewPermission');

        //open ticket
        Route::middleware(['role:admin-assistant'])->get('/open',  'openTicket');
        Route::middleware(['role:staff'])->put('/open/update', 'openTicketUpdate');
        Route::middleware(['role:staff'])->post('/open/conversation/save', 'openTicketConversation');
        Route::middleware(['role:staff'])->get('/open/reject/{ticket_id}', 'openTicketReject');
        Route::middleware(['role:staff'])->get('/open/close/{ticket_id}', 'openTicketClose');
        Route::middleware(['role:staff'])->get('/open/details/{ticket_id}', 'openTicketDetails');
        Route::middleware(['role:staff'])->post('/open/forward', 'forwardOpenTicket');

        //processing ticket
        Route::middleware(['role:staff'])->get('/processing', 'processingTicket');
        Route::middleware(['role:staff'])->post('/processing/conversation/save', 'processingTicketConversation');
        Route::middleware(['role:staff'])->get('/processing/reject/{ticket_id}', 'processingTicketReject');
        Route::middleware(['role:staff'])->get('/processing/close/{ticket_id}', 'processingTicketClose');
        Route::middleware(['role:staff'])->get('/processing/details/{ticket_id}', 'processingTicketDetails');
        Route::middleware(['role:staff'])->post('/processing/forward', 'forwardProcessingTicket');

        //closed ticket
        Route::middleware(['role:staff'])->get('/closed', 'closedTicket');
        Route::middleware(['role:staff'])->get('/closed/details/{ticket_id}', 'closedTicketDetails');
        Route::middleware(['role:admin-assistant'])->get('/closed/publish/{ticket_id}', 'closedTicketPublish');

        //rejected ticket
        Route::middleware(['role:staff'])->get('/rejected', 'rejectedTicket');
        Route::middleware(['role:staff'])->get('/rejected/details/{ticket_id}', 'rejectedTicketDetails');
    });
});

require __DIR__ . '/auth.php'; //user auth files and routes

require __DIR__ . '/adminauth.php'; //admin auth files and routes
